<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index() {
        return view('admin.dashboard');
    }

    public function login()
    {
        return view('admin.login');
    }

    public function check(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = [
            'email'=>'admin@gmail.com',
            'password'=>'Admin@123'
        ];

        if ($request->email==$user['email'] && $request->password==$user['password']) {
            Session::put('admin','Admin@123');
            return redirect()->route('admin.dashboard');
        }
        return redirect()->back()->with('error','Invalid Credetials !');
    }

    public function logout()
    {   
        if (Session::has('admin')) {
            Session::forget('admin');    
            return redirect()->route('admin.login')->with('success','Logout Successfully !');
        }
        return redirect()->route('admin.login')->with('error','Invalid session!');

    }
}
