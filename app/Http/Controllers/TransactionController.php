<?php

namespace App\Http\Controllers;;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\ProductCategory;
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

    public function transaction(Request $request)
    {      
        $from = date($request->from_date);

        $to = date($request->to_date);
        $salesAmount = Transaction::getSalesAmount($from, $to);
        dd($salesAmount);
        $purchase_amount = Transaction::whereBetween('date', [$from, $to])->where('type','vendor')->sum('amount');

        $result = $sales_amount - $purchase_amount;    

        if($result <= 0)
        {
            $qwerty = abs($result);
            $message="loss";
            
        }else{
            $message="earn";
        
        }

        return view('transaction.report',compact('result','message'));

    }

    public function report()
    {
        $product_category = ProductCategory::get();
        return view('transaction.search',compact('product_category'));
    }
}
