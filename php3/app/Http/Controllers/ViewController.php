<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;

class ViewController extends Controller
{

    public function index(){
        
        return view('welcome');
    }
    public function nav(){
        
        return view('layouts.nav');
    }
    
}
