<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\Vendor;
use App\Models\User;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user= User::vendor()->get();   
        return view('vendor.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.add');
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
            'name'=>'required',
            'email' => 'required|email|unique:users,email',
           'password'=>'required',
        ]);
        $request['password'] = Hash::make('password');
        $request['type'] = 'vendor';

        User::create($request->all());
        return redirect()->back()->with('status','create successfully ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $vendor)
    {      
        return view('vendor.edit',compact('vendor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $vendor)
    {
        $validated = $request->validate([
            'name'=>'required',
            'email' => 'required|unique:users,email,'.$request->email.',email',          
        ]);       
        $request['type'] = 'vendor';
        $vendor->update($request->all());
        return redirect()->back()->with('status','edit successfully ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $vendor)
    {
        
        $vendor->delete();
        return redirect()->back()->with('status','deleted successfully');
    }
}
