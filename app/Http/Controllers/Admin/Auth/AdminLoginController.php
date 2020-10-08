<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    use AuthenticatesUsers;
    public function getLoginAdmin()
    {
        return view('admin.login.login');
    }

    public function postLoginAdmin(Request $request)
    {
        $data = $request->only('email', 'password');
        if (Auth::guard('admins')->attempt($data)) {
//            Auth::user()\
//            return Auth::guard('admins')->user()->role_id;
            return redirect()->route('get.dashboard.admin');
        } else {
            return redirect()->back()->with('status', 'Invalid Email or Password');
        }
    }

    function getLogoutAdmin()
    {
        Auth::guard('admins')->logout();
        return redirect()->route('get.login.admin');
    }
}
