<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class Login_adminController extends Controller
{
    public function get_login()
    {
        return view('admin.logins.login');
    }

    public function login(Request $request)
    {
        $info = $request->only('email', 'password');
        $attempt = Auth::attempt($info);

        if ($attempt == false) {
            return redirect()->back()->with('errorMessage', 'Email hoặc mật khẩu không đúng!');
        } else {
            $user_info = Auth::user();           
            if ($user_info->status != 'active') {
                return redirect()->back()->with('errorMessage', 'Tài khoản không được hỗ trợ hoặc đã bị xóa!');
            } else {
                return redirect()->route('home');
            }
        }
        return view('admin.logins.login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
// User::create([
    //     'email' => 'phucphipham1372000@gmail.com',
    //     'password' => Hash::make('123456')
    // ]);
