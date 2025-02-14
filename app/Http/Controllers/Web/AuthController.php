<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\user\UserLogin;
use App\Http\Requests\user\UserRegister;
use App\Http\Requests\user\UserUpdateRequest;
use App\Models\Admin;
use App\Models\User;
use App\Notifications\NewUserRegister;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use voku\helper\ASCII;

class AuthController extends Controller
{
    public function register()
    {
        return view('website.auth.register');
    }

    public function postRegister(UserRegister $request)
    {
        $user = User::create($request->all());
        $admins = Admin::all();
        Notification::send($admins, new NewUserRegister($user));
        return back()->with('success', 'You have been registered successfully');
    }

    public function login()
    {
        return view('website.auth.login');
    }

    public function postLogin(UserLogin $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->remember_token;
        if (Auth::guard('web')->attempt($credentials, $remember)) {
            return back()->with('success', 'You have been logged in successfully');
        }
        return back()->with('error', 'Invalid credentials');
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('login');
    }

    public function profile()
    {
        $user = Auth::guard('web')->user();
        return view('website.auth.profile', [
            'user' => $user
        ]);
    }

    public function postProfile(UserUpdateRequest $request)
    {
        $user = Auth::guard('web')->user();
        $data = $request->except('password');
        if ($request->password != null) {
            $user->password = Hash::make($request->password);
        }
        $user->update($data);
        return back()->with('success', 'You have been updated successfully');
    }
}
