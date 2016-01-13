<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class getMaterials extends Controller
{
    /**
     *
     * @param  int  $id
     * @return Response
     */
    public function index()
    {
        //return view('user.profile', ['user' => User::findOrFail($id)]);
        
        return view('pages.designer');
    }
}

