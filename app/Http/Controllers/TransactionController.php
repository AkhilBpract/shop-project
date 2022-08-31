<?php

namespace App\Http\Controllers;;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use DB;
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

    public function transaction(Request $request)
    {   
        $result = Transaction::getAmountWithDate($request);           
        
        // $purchaseAmount = Transaction::getPurchaseAmount ($request);
        
        
        
        
        // dd($amount);
         
        if($result <= 0)
        {
            $report = abs($result);
            $message="loss";
            
        }else{
            $report = $result;
            $message="profit";
        
        }
        return view('transaction.report',compact('report','message'));

    }

    public function report()
    {
        $product_category = ProductCategory::get();
        return view('transaction.search',compact('product_category'));
    }
}
