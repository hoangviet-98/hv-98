<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestLogin;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin(RequestLogin $request)
    {
//        echo "dsadsad";
//        return  "dasdas";
//        if (Auth::guard('users')->attempt(['email' => $request->email, 'password' => $request->password])) {
        $credentials = $request->only('email', 'password');
        if(    Auth::attempt($credentials)  ) {
//            return"test";
//            return view('frontend.pages.home.index');
//            redirect('/');
//            return redirect()->intended('/');
            return  redirect("/");
//            return "dasd";
        }
//        return "1dsad";
        return redirect()->back();
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('get.login');
    }
}
