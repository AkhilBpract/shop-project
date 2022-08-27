<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user= Vendor::where('type','vendor')->get();
        // dd($user);
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
           'password'=>'required|password',
        ]);
        $request['password'] = Hash::make('password');
        $request['type'] = 'vendor';

        Vendor::create($request->all());
        return redirect()->back()->with('status','added successfully ');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show(Vendor $vendor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendor $vendor)
    {
        $vendor = $vendor;
        return view('vendor.edit',compact('vendor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vendor $vendor)
    {
        $validated = $request->validate([
            'name'=>'required',
            'email' => 'required|unique:users,email,'.$request->email.',email',
          
        ]);
       
        $request['type'] = 'vendor';

        $vendor->update($request->all());
        return redirect()->back()->with('status','update successfully ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendor $vendor)
    {
        $vendor->delete();
        return redirect()->back()->with('status','deleted successfully');
    }
}
