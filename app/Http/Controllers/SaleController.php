<?php


namespace App\Http\Controllers;
use App\Models\User;
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
        $sales_data = Transaction::sale()->with('user')->get();       
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
        $request['date'] =Carbon::today();
        $request['type']= 'sales';
        Transaction::create($request->all());
        return redirect()->back()->with('status','sale succesfully');
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
    public function edit(Transaction $sale)
    {            
        $users = User::customer()->get();          
        $product = Product::where('id',$sale->product_id)->get();         
        $product_category = ProductCategory::get();              
        return view('sale.edit',compact('users','product_category','sale','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $sale)
    {
        $validated = $request->validate([
            'product_category_id'=>'required',
            'product_id'=>'required',
            'user_id'=>'required',
            'quantity'=>'required',            
            'price'=>'required', 
            'amount'=>'required',            
        ]);       
        $sale->update($request->all());
        return redirect()->back()->with('status','edit succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $sale)
    {
        $sale->delete();
        return redirect()->back()->with('status','deleted successfully');
    }
}
