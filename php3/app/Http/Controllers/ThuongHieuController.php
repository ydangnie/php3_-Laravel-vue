<?php

namespace App\Http\Controllers;

use App\Models\ThuongHieu as ModelThuongHieu;
use Illuminate\Http\Request;

class ThuongHieuController extends Controller
{
    public function index(Request $request) {
        $keyword = $request->input('search');

        $thuonghieu = ModelThuongHieu::where('name', 'like', '%' . $keyword)->paginate(3);


        return view('thuonghieu.index', ['thuonghieu' => $thuonghieu]);

    }
}
