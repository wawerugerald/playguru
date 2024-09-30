<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndustriesController extends Controller
{
    //
    public function index(){

        return view("industries.index");
    }
}
