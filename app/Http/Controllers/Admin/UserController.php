<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\user\UserStoreRequest;
use App\Http\Requests\user\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', [
            'users' => $users
        ]);
    }

    public function store(UserStoreRequest $request)
    {
        User::create($request->all());
        return back()->with('success', 'User created successfully');
    }

    public function update(UserUpdateRequest $request, $userId)
    {
        $user = User::find($userId);
        $data = $request->except('password');
        if($request->apssword != null){
            $user->password = Hash::make($request->password);
        }
        $user->update($data);
        return back()->with('success', 'User updated successfully');
    }

    public function delete($userId)
    {
        $user = User::find($userId);
        $user->delete();
        return back()->with('success', 'User deleted successfully');
    }
}
