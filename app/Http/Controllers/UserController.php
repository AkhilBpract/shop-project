<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function list()
    {
        $user = User::paginate(5);
        return view('user.index',compact('user'));
    }
    public function add_user()
    {
        return view('user.add');
    }
    public function store(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'address' => 'required',
            'password' => 'required|password',
            'type'=>'required',
            'active'=>'required',
        ]);
        // $user =new User;
        // dd($validated);
        $Register = new User;
        $Register->name = $request->name;
        $Register->email = $request->email;
        $Register->address = $request->address;
        $Register->password = $request->password;
        $Register->type = $request->type;
        $Register->active = $request->active;
        $Register->save();
        return redirect()->back();
    //    User::create($validated);
    //     $user = User::create([
    //     'name'=>$request->name,
    //     'address'=>$request->address,
    //     'type'=>$request->type,
    //     'active'=>$request->active,
    //     'email'=>$request->email,
    //     'password'=>$request->password
    // ]);
    // dd($Register);

        //  $Register ->save();
     
    }
    public function edit($id)
    {
        $user = User::where('id',$id)->first();
        // dd($user);
        return view('user.edit',compact('user'));
    }

    public function update(Request $request,$id)
    {
        // dd($request);
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'unique:users,email,'.$request->id,
            'address' => 'required',           
            'type'=>'required',
            'active'=>'required',
        ]);
        // dd($validated);
        $Register = User::where('id',$id)->first();
        $Register->name = $request->name;
        $Register->email = $request->email;
        $Register->address = $request->address;
        $Register->password = $request->password;
        $Register->type = $request->type;
        $Register->active = $request->active;
        // dd($Register);
        $Register->update();
        return view('dashboard.dashboard');

    }
    public function delete($id)
    {
        $user = User::where('id',$id)->delete();
        return redirect()->back();
    }

  
  
    
}