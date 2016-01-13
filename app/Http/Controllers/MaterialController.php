<?php

namespace App\Http\Controllers;

use App\Material;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    //
    public function index()
    {

        $materials = Material::all();
        
        return view('material.index',compact('materials'));
        
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //echo
        return view('material.create');
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
        $material = Material::where('material_id','=',$id)->first();

        //$material = $results->items;

        //var_dump($material);exit;
        
        return view('material.show',compact('material'));
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
