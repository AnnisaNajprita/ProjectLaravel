<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SessionController extends Controller
{
    function index()
    {
        return view("sesi/index");
    }
    function login(Request $request)
    {
        Session::flash('email', $request->email);
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email is required',
            'password.required' => 'Password is required'
        ]);
    
        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::attempt($infologin)) {
            return redirect('student')->with('success', 'Login Successfully');
        } else {
            return redirect('sesi')->withErrors('The username and password entered do not match');
        }
    }
    function logout()
    {
        Auth::logout();
        return redirect('sesi')->with('success', 'Logout Successfully');
    }

    function register()
    {
        return view('sesi/register');
    }
    function create(Request $request)
    {
        Session::flash('name', $request->name);
        Session::flash('email', $request->email);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ], [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'email,email' => 'Please input valid email',
            'email.unique' => 'Email is already registered, please register another email',
            'password.required' => 'Password is required',
            'password.min' => 'The password you created is less than 6 characters'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];
        User::create($data);
    
        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::attempt($infologin)) {
            return redirect('student')->with('success', Auth::user()->name . '
            Login Successfully');
        } else {
            return redirect('sesi')->withErrors('The username and password entered do not match');
        } 
    }
}