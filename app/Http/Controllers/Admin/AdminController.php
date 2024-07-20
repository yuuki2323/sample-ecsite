<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function editProfile()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.profile.edit', compact('admin'));
    }

    public function updateProfile(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admin_users,email,' . $admin->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // プロパティの更新
        $admin->name = $data['name'];
        $admin->email = $data['email'];
        if (!empty($data['password'])) {
            $admin->password = Hash::make($data['password']);
        }

        // モデルの保存
        $admin->save();

        return redirect()->route('admin.dashboard')->with('success', 'プロフィールが更新されました。');
    }
}
