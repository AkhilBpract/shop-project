<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Jobs\SendEmail;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = User::with('roles')->where('type','employee')->get();        
        return view('employee.index',compact('employees')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::get();
        return view('employee.create',compact('role'));
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
            'password' => 'required',
           
        ]);
        $request['type'] = 'employee';   
        $request['password'] = Hash::make('password');             
        $user = User::create($request->except('role'));
        $user->roles()->attach($request->role);
        // $emp_mail = $request->email;        
        SendEmail::dispatch('1');
        return redirect()->back()->with('status','create successfully');
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
    public function edit(User $employee)
    {   
     
        $role = Role::get();       
        return view('employee.edit',compact('employee','role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $employee)
    {
        $validated = $request->validate([
            'name'=>'required',
            'email' => 'required|email|unique:users,email',            
        ]);  
        $user=Role::where('id',$employee)->first();                  
        $employee->update($request->except('role'));       
        $employee->roles()->attach(Role::where('role')->first());       
        return redirect()->back()->with('status','create successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $employee)
    {
        
        $employee->delete();
        return redirect()->back()->with('success','successfully deleted');
    }
}
