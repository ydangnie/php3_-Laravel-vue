<?php

namespace App\Http\Controllers;
use App\Models\ProductModel;
use Illuminate\Routing\Controller;


abstract class ViewController extends Controller
{
    public function index(){
        $prodcuts = ProductModel::all();
        return view('welcome', compact('products'));

    }
}
