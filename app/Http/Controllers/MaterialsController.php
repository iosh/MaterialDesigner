<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MaterialsController extends Controller
{
    //
    public function index()
    {

        return view('pages.designer')->with('title','Material Designer');
        
    }
}
