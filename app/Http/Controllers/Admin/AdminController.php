<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\LoginRequest;
use App\Http\Requests\admin\ProfileUpdateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
//    Admin Auth

    public function login()
    {
        return view('admin.login');
    }

    public function postLogin(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->remember;
        if (Auth::guard('admin')->attempt($credentials, $remember)) {
            return to_route('admin.dashboard');
        }
        return back()->with('error', 'Invalid credentials');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return to_route('admin.login');
    }

//    Home
    public function dashboard()
    {
        return view('admin.dashboard');
    }

//    Admin Profile
    public function profile()
    {
        $user = Auth::guard('admin')->user();
        return view('admin.profile', [
            'user' => $user
        ]);
    }

    public function postProfile(ProfileUpdateRequest $request)
    {
        $user = Auth::guard('admin')->user();
        $data = $request->except('password');
        if($request->password != null){
            $user->password = Hash::make($request->password);
        }
        $user->update($data);
        return back()->with('success', 'Profile updated successfully');
    }
}
