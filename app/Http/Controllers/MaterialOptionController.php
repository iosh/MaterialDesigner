<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\MaterialOption;

class MaterialOptionController extends Controller
{

    //
    public function index($id)
    {

        
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
            'description' => 'required',
        ]);
        
        $input = $request->all();
        
        $location = '/public/images/material/';
        
        $imageName = $this->processImage(
            $request->file('thumbnail'),
            $location
            );
        
        $input['thumbnail'] = $imageName;
        
        Material::create($input);
    
        return redirect('material');
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
        $materialOptions = MaterialOption::where('material_id','=',$id)->get();
        $materialOptions->id = $id;
        return view('materialoption.index',compact('materialOptions'));
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
        $material = Material::where('material_id','=',$id)->first();
    
        return view('material.edit',compact('material'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        //echo $request->file('thumbnail');exit;
        $materialUpdate = array_except($request->all(), array('_method','_token'));
       
        //$material=material::find($id);
        $material = Material::where('material_id','=',$id)->first();
        //var_dump($materialUpdate);exit;
        //get filename and move
        $location = '/public/images/material/';
        //var_dump($material);exit;
        $imageName = $this->processImage(
            $request->file('thumbnail'),
            $location
            );
        
        $materialUpdate['thumbnail'] = $imageName;
        
        //var_dump($materialUpdate);
        
        $material->where('material_id','=',$id)
                ->update($materialUpdate);
       
        return redirect('material');
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
        Material::where('material_id','=',$id)
                ->delete();
        
        return redirect('material');
    }
    public function rules()
    {
        return [
          'name'        => 'required',
          'description' => 'required',
          'image'       => 'required',
          'thumbnail'   => 'required|mimes:png'
        ];
    }
    
    
    /**
     * Move Image to folder.
     *
     * @param  int  $id
     * @return Response
     */
    
    public function processImage($image,$location)
    {
        $imageName = $image->getClientOriginalName();

        $image->move(base_path() . $location, $imageName);
        
        return $imageName;
    }

}
