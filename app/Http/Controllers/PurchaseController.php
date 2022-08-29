<?php

namespace App\Http\Controllers;
use App\Models\ProductCategory;
use App\Models\User;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Carbon\Carbon;
class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchase_datas   = Transaction::where('type','vendor')->get();
        return view('purchase.index',compact('purchase_datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_category = ProductCategory::get();
        $users = User::where('type','vendor')->get();
        return view('purchase.add',compact('users','product_category'));
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
        $request['type']= 'vendor';
        Purchase::create($request->all());
        return redirect()->back()->with('status','purchase succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        $purchase_data =$purchase;  
        $product_category = ProductCategory::get();   
        $users = User::where('type','vendor')->get();          
        $product = Product::where('id',$purchase_data->product_id)->get();         
        
        return view('purchase.edit',compact('purchase_data','product_category','users','product',));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {
        $validated = $request->validate([
            'product_category_id'=>'required',
            'product_id'=>'required',
            'user_id'=>'required',
            'quantity'=>'required',            
            'price'=>'required', 
            'amount'=>'required',            
        ]);       
        $purchase->update($request->all());
        return redirect()->back()->with('status','edit successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        $purchase->delete();
        return redirect()->back()->with('status','deleted successfully');
    }
   
}
