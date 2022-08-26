<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {

        // $datas = Transaction::paginate(5);
        
        // return view('transaction.index',compact('datas'));
        return view('transaction.index');
    }
    public function transaction()
    {
        $category = Category::get();

        // dd($category);
              $users = User::get();
            //   dd($users);
           
        return view('transaction.transaction',compact('category','users'));

    }

    
    public function type(Request $request)
    {
        $user_id = $request->user_id;

        $type = User::where('id',$user_id)->value('type');

        return response()->json($type);


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

        // return response()->json(['sale_price'=>$price]);     
        return response()->json($price);     
    }

    public function store(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            'category_id'=>'required',
            'product_id'=>'required',
            'user_id'=>'required',
            'quantity'=>'required',
            
            'price'=>'required',
            'type'=>'required',
        ]);
        $today = Carbon::today();
        $quantity = $request->quantity;
        $price = $request->price;
        $amount = $quantity*$price;

        $store = new Transaction;
        $store->date = $today;
        $store->quantity = $quantity;
        $store->price = $price;
        $store->amount = $amount;
        $store->type = $request->type;
        $store->category_id = $request->category_id;
        $store->product_id = $request->product_id;
        $store->user_id = $request->user_id;
       
        $store->save();       
        
        // // dd(1);
        // Transaction::create([
        //     'date' => 2,
        //     'price' => 1,
        //     // 'amount ' => $amount,
        //     // 'quantity ' => $quantity,
        //     'category_id '=>1,
        //     // 'product_id ' => $request->product_id,
        //     // 'type ' => $request->type,                      

        // ]);
        // // return view('transaction.amount',compact('amount'));
        return view('transaction.amount',compact('amount'));
    }
}
