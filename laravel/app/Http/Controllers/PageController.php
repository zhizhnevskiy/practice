<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show($slug){
//        return view("pages.$slug");
        return view("pages.show", ['slug'=>$slug]);
    }
}
