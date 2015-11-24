<?php

namespace App\Http\Controllers;


class HomeController extends Controller
{

    public function index($name){

        return view('test',['name'=>$name]);
    }
}