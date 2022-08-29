<?php

namespace App\Http\Controllers;;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function product(Request $request)
    {
        $category = $request->category_id;
        
        $products = Product::where('product_category_id',$category)->get();
        return view('transaction.product',compact('products'));
    }

    public function price(Request $request)
    {
        $product_id = $request->product_id;        
        $price = Product::where('id',$product_id)->value('sale_price');            
        return response()->json($price);     
    }
}
