<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;

class ViewController extends Controller
{

    public function index(){
        $products = ProductModel::all();
        return view('welcome', compact('products'));
    }
    
}
