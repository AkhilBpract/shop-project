<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Jobs\SendEmail;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user= User::customer()->get();
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
    {        $validated = $request->validate([
            'name'=>'required',
            'email' => 'required|email|unique:users,email',
           'password'=>'required',
    ]);     
   
        $request['type'] = 'customer';   
        $request['password'] = Hash::make('password');        
        // $role = Role::create(['role' => 'customer']);
        $role = Role::where('role','customer')->value('id');       
        $user = User::create($request->all());
        $user->roles()->attach($role);      
        // $email = new SendEmail();       
        // $this->dispatch($email); 
        SendEmail::dispatch('akhil@bpract.com', 'Akhil');
        
        return redirect()->back()->with('status','create successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $Customer)
    {             
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $Customer)
    {
        return view('customer.edit',compact('Customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $Customer)
    {
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $Customer)
    {
        $Customer->delete();
        return redirect()->back();
    }
}
