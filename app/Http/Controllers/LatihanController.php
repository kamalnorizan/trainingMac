<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LatihanController extends Controller
{
    //
    public function index($name)
    {

        $name2 = 'Norizan';
        return view('latihan.index',compact('name','name2'));
    }
}
