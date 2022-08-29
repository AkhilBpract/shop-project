<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $user= Customer::where('type','customer')->get();
        return view('customer.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            'name'=>'required',
            'email' => 'required|email|unique:users,email',
           'password'=>'required|password',
        ]);
        // dd($request);
        $request['type'] = 'customer';
        
        Customer::create($request->all());
        return redirect()->back()->with('status','create successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $Customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $Customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $Customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $Customer)
    {
        // $Customer->$id;
        // dd($Customer->id);
        $Customer = $Customer;
        // dd($Customer->address);
        return view('customer.edit',compact('Customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $Customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $Customer)
    {
        // dd($request->email);
    
        $validated = $request->validate([
            'name'=>'required',         
            'email' => 'required|unique:users,email,'.$request->email.',email',
        ]);
        $request['type'] = 'customer';
        $Customer ->update($request->all());
        return redirect()->back()->with('status','edit successfully ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $Customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $Customer)
    {
        $Customer->delete();
        return redirect()->back();
    }
}
