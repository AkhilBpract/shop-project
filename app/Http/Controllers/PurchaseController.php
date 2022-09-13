<?php

namespace App\Http\Controllers;
use App\Models\ProductCategory;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {      
        if(Auth::user()->hasRole('admin')||Auth::user()->hasRole('purchase department'))
        {
        $purchase_datas   = Transaction::purchase()->get();
        return view('purchase.index',compact('purchase_datas'));
        }
        if(Auth::user()->hasRole('vendor'))
        {
        $purchase_datas   = Transaction::where('user_id',Auth::user()->id)->get();
        return view('purchase.index',compact('purchase_datas'));
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_category = ProductCategory::get();
        $users = User::vendor()->get();
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
       
        $request['date'] =  $today = Carbon::today();
        $request['type']= 'purchase';
        Transaction::create($request->all());
        return redirect()->back()->with('status','purchase succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $purchase)
    {
        $purchase_data =$purchase;  
        $product_category = ProductCategory::get();   
        $users = User::vendor()->get();          
        $product = Product::where('id',$purchase->product_id)->get();       
        return view('purchase.edit',compact('purchase','product_category','users','product',));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $purchase)
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
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $purchase)
    {
        $purchase->delete();
        return redirect()->back()->with('status','deleted successfully');
    }
}
