<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Sale;
use App\Models\ProductCategory;
use App\Models\Transaction;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales_data  =  Sale::with(['product','user','category'])->get();
        return view('sale.index',compact('sales_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = ProductCategory::get();
        $users = User::where('type','customer')->get();
      
        return view('sale.add',compact('category','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_category_id'=>'required',
            'product_id'=>'required',
            'user_id'=>'required',
            'quantity'=>'required',            
            'price'=>'required', 
            'amount'=>'required',            
        ]);
        $today = Carbon::today();
        $request['date'] = $today;
        $request['type']= 'customer';
        Sale::create($request->all());
        return redirect()->back()->with('status','added succesfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        $users = User::where('type','customer')->get();       
        $category = ProductCategory::get();
        $sale =$sale;
        // dd($sale->user_id);
        return view('sale.edit',compact('users','category','sale'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        $validated = $request->validate([
            'product_category_id'=>'required',
            'product_id'=>'required',
            'user_id'=>'required',
            'quantity'=>'required',            
            'price'=>'required', 
            'amount'=>'required',            
        ]);       
        sale::create($request->all());
        return redirect()->back()->with('status','added succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        $sale->delete();
        return redirect()->back()->with('status','deleted successfully');
    }

    public function product(Request $request)
    {
        $category = $request->category_id;
        
        $products = Product::where('product_category_id',$category)->get();
        return view('sale.product',compact('products'));
    }

    public function price(Request $request)
    {
        $product_id = $request->product_id;
        
        $price = Product::where('id',$product_id)->value('sale_price');
        // return response()->json(['sale_price'=>$price]);     
        return response()->json($price);     
    }

  
}

