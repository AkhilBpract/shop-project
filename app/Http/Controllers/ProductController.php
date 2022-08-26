<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Product;
class ProductController extends Controller
{
    public function list()
    {
        $datas = ProductCategory::with('product')->get();
        return view('product.index',compact('datas'));
        
    }
    public function add()
    {
        // $data = Category::get();
        $data = ProductCategory::with('product')->get();
        return view('product.add',compact('data'));
    }
    public function store(Request $request)
    {
        //return $request->all();
        $validated = $request->validate([
            'category_id'=>'required',
            'product'=>'required',
            'vendor_price'=>'required',
            'sale_price'=>'required',
            'active'=>'required',
        ]);
        //  dd($validated);
        // dd($validated);
      
        Product::create($validated);
        
        return redirect()->back();
        // $store->category_id = $request->category_id;
    }


    public function edit(request $request,$id)
    {
        // dd($request->category_id);
        $products = Product::where('id',$id)->first();
        // dd($products->category_id);
        $datas = ProductCategory::get();
        return view('product.edit',compact('products','datas'));
    }
    public function update(Request $request , $id)
    {
        // dd($request);
        $Update = Product::where('id',$id)->first();
        Product::where('id',$id)->update([
            'category_id'=>$request->category_id,
            'vendor_price'=>$request->vendor_price,
            'active'=>$request->active,
            'sale_price'=>$request->sale_price,
            'product'=>$request->product,
        ]);
        return redirect()->back();


    }

    public function delete($id)
    {
        $product =Product::where('id',$id)->delete();
        return redirect()->back();
    }


}
