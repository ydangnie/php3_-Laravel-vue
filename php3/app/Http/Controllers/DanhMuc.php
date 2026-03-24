<?php

namespace App\Http\Controllers;

use App\Models\Danhmuc as ModelsDanhmuc;
use Illuminate\Http\Request;

class DanhMuc extends Controller
{
 public function index( Request $request){
    $keyword = $request->input('search');
    $danhmuc = ModelsDanhmuc::where('name', 'like', '%')->paginate(3);
    return view('danhmuc.index',['danhmuc' => $danhmuc]);


 }   
}
