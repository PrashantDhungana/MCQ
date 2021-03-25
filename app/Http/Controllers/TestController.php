<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test(){
        return "yoyo";
    }
    public function valid(Request $request){
        // $test = $request->all();
        // dd($test);
        $request->validate([
            'field' => 'required|min:10',
            'field.*' => 'required|min:10',    

        ]);
        echo("hi");
    }
}
