<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
        $test = "ceci est un test";
        
        return view('test',[
            'test' => $test
            ]); 
    }
}
