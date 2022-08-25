<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {

        $datas = Transaction::paginate(5);
        
        return view('transaction.index',compact('datas'));
    }
    public function transaction()
    {
        $category = Category::get();

        // dd($category);
              $users = User::get();
            //   dd($users);
           
        return view('transaction.transaction',compact('category','users'));

    }

    public function store()
    {
              
       

    }

    public function product(Request $request)
    {
        $category = $request->category_id;
        
        $products = Product::where('category_id',$category)->get();
        return view('transaction.product',compact('products'));
    }

    public function price(Request $request)
    {
        $product_id = $request->product_id;
        
        $price = Product::where('id',$product_id)->value('sale_price');

        return response()->json(['sale_price'=>$price]);     
       
    }
    // public function price(Request $request)
    // {
    //     $data['cities'] = Product::where("state_id", $request->state_id)
    //                                 ->get(["name", "id"]);

    //     return response()->json($data);
    // }
}
