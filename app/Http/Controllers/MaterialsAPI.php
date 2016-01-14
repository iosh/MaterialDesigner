<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Material;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class MaterialsAPI extends Controller
{
    //
    public function index()
    {

        $materials = Material::all();
        
        //$response = json_decode($materials);
        return response()->json($materials);
        
    }
}
