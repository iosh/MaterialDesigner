<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Material;
use App\MaterialOption;

class MaterialOptionController extends Controller
{

    //
    public function index($id)
    {
        $materialOptions = MaterialOption::where('material_id','=',$id)->get();
        
        $materialOptions->name = Material::select('name')
                                                        ->where('material_id','=',$id)
                                                        ->first()->name;
        $materialOptions->id = $id;
        
        return view('materialoption.index',compact('materialOptions'));
        
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($id)
    {
        //
        return view('materialoption.create',compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image'   => 'required|mimes:png',
        ]);
        
        $input = $request->all();
        
        $location = '/public/images/materialoption/';
        
        $imageName = $this->processImage(
                                        $input['name'],
                                        $request->file('image'),
                                        $location
                                        );
        
        $input['image'] = $imageName;

        MaterialOption::create($input);
        
        $material_id = $input['material_id'];
        
        return redirect()->route('materialoption.show', array($material_id));
    } 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
        $materialOptions = MaterialOption::where('material_option_id','=',$id)->first();
        
        $materialOptions->id = $id;
        
        return view('materialoption.show',compact('materialOptions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //Get material
        $materialOption = MaterialOption::where('material_option_id','=',$id)->first();

        $materials = Material::lists('name','material_id');
        
        
        return view('materialoption.edit',compact('materialOption','materials'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image'   => 'mimes:png',
        ]);
        
        $materialOptionUpdate = array_except($request->all(), array('_method','_token'));
       
        //$material=material::find($id);
        $material = MaterialOption::where('material_option_id','=',$id)->first();

        //get filename and move
        if(isset($materialOptionUpdate['image']))
        {
            $location = '/public/images/materialoption/';
    
            $imageName = $this->processImage(
                                            $materialOptionUpdate['name'],
                                            $request->file('image'),
                                            $location
                                            );
            
            $materialOptionUpdate['image'] = $imageName;
        }
        
            
        $material->where('material_option_id','=',$id)
                ->update($materialOptionUpdate);
       
       return redirect()->route('materialoption.show', array($materialOptionUpdate['material_id']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
        MaterialOption::where('material_option_id','=',$id)
                ->delete();
        
        return redirect('material');
    }
    public function rules()
    {
        return [
          'name'        => 'required',
          'description' => 'required',
          'image'       => 'required|mimes:png',
        ];
    }
    
    
    /**
     * Move Image to folder.
     *
     * @param  int  $id
     * @return Response
     */
    
    public function processImage($name,$image,$location)
    {
        $imageName = $name.'-'.$image->getClientOriginalName();

        $image->move(base_path() . $location, $imageName);
        
        return $imageName;
    }

}
