<?php

namespace App\Http\Controllers;
use carbon\carbon;
use Illuminate\Http\Request;
use App\Models\User;
class ResetPasswordController extends Controller
{
    public function index()
    {
        return view('forgot-password.emailverification');
    }

    public function resetLink(Request $request)
    {
        $request->validate([
            'email'=>'required|email|exists:users,email'
        ]);
        $token =\Str::random(64);
        \DB::table('password_resets')->insert([
            'email'=> $request->email,
            'token'=>$token,
            'created_at' => Carbon::now(),
        ]);
        $action_link = route('reset_form',['token'=>$token,'email'=>$request->email]);
        // dd($action_link);
        $body = "we have request to reset the password form "."$request->email"."<br>you can reset your password by clicking the link below";

        \Mail::send('forgot-password.forgotpassword',['action_link'=>$action_link,'body'=>$body],function($message)use($request){
            $message->from('akhil@bpract.com');
            $message->to($request->email)
            ->subject('reset password');
            return redirect()->back()->with('success','we have a emailed your password reset link');
        });


    }
    public function forgotPassword(Request $request,$token=null)
    {

        return view('forgot-password.reset')->with(['token'=>$token , 'email'=>$request->email]);
    }
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:5|confirmed',
            'password_confirmation' => 'required',
        ]);
        // dd($request);
        $token_check = \DB::table('password_resets')->where([
            'email'=>$request ->email,
            'token' => $request->token,
        ])->first();
        if(!$token_check)
        {
            return redirect()->back()->withInput()->with('success','invalid token');
        }
        else
        {
            User::where('email',$request->email)->update([
                'password'=>\Hash::make($request->password),
            ]);
            \DB::table('password_resets')->where([
                'email'=> $request->email
            ])->delete();
            return redirect()->route('login')->with('status','your password has been changed');

        }
    }

}
