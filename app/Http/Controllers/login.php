<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class login extends Controller
{
    public function index(){
        $data['title'] = 'login';
        return view('login.login');
    }

    public function register(){
        $data['title'] = 'register';
        return view('login.register');
    }

    public function forgot_password(){
        $data['title'] = 'forgot';
        return view('login.forgot-password');
    }
    public function process_register( Request $request){
        $request -> validate([
            'name'     => 'required|max:255',
            'username' => 'required|unique:user',
            'email'    => 'required|email',
            'password' => 'required',
        ]);

       $info = array ( 

           'name'     => $request ->input('name'),
           'email'    => $request ->input('email'),
           'username' => $request ->input('username'),
           'password' => Hash::make($request -> input ('password')),
       );
       $user = User::create($info);
       if (!empty($user)) {
           return redirect()->route('login')->with('message', 'User is registered. You can now login.');
       } else {
        return redirect()->back()->with('error', 'Try again.');
       }
               
    }
   public function authenticate_user(Request $request)
{
    $request->validate([
        'username' => 'required|max:255',
        'password' => 'required|max:255',
    ]);

    $credentials = array(
        'username' => $request->input('username'),
        'password' => $request->input('password'),
    );

    if (Auth::attempt($credentials)) 
        return redirect()->intended(route('admin.dashboard'));
    else 
        return redirect()->back()->with('error', 'Try again.');
    }
}
