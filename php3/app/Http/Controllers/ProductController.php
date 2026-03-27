<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use Illuminate\Container\Attributes\Storage;
use Illuminate\Routing\Controller;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('search');
        $products = ProductModel::where('name', 'like', '%' . $keyword)->paginate(10);

        return view('admin.products.index', ['products' => $products]);
    }
    public function create()
    {
        return view('admin.products.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'slug'        => 'required|string|max:255|unique:products,slug',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'quantity'    => 'required|integer|min:0',
            'status'      => 'required|in:0,1',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'name.required' => 'Vui lòng nhập tên sản phẩm.',
            'slug.unique'   => 'Đường dẫn này đã tồn tại, vui lòng chọn tên khác.',
            'price.numeric' => 'Giá phải là một con số.',
        ]);
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $data['image'] = $path;
        }

        ProductModel::create($data);

        return redirect('admin/products')->with('thongbao', 'Thêm thành công');
    }
    public function edit($id)
    {
        $product = ProductModel::findOrFail($id);
        return view('admin/products/edit', compact('product'));
    }
    public function update(Request $request, $id)
    {

       $data = $request->validate([
            'name'        => 'required|string|max:255',
            'slug'        => 'required|string|max:255|unique:products,slug',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'quantity'    => 'required|integer|min:0',
            'status'      => 'required|in:0,1',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $product = ProductModel::findOrFail($id);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $data['image'] = $path;
        }
        
          $product->update($data);
        

        return redirect()->route('products.index')->with('thongbao', 'Cập nhật thành công');
    }

    public function destroy(ProductModel $product)
    {
        $product = ProductModel::findOrFail($product->id);
        $product->delete();
        return redirect('admin/products')->with('thongbao', 'Xóa thành công');
    }
}
