<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
            $user_info = DB::table('user')
                ->where('email', '=', $request->email)
                ->join('roles', 'roles.id', '=', 'user.role_id')
                ->first();
                return view('admin.left', compact('user_info'));
            // if ($user_info->status != 'active') {
            //     // Bao loi
            // } else {
                return redirect()->route('home');
            // }
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
