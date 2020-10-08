<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestRegister;
use App\Mail\RegisterSuccess;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    public function getRegister()
    {
        return view('auth.register');
    }

    public function postRegister(RequestRegister $request)
    {
//        $data             = $request->except("_token");
//        $data['password'] = Hash::make($data['password']);
//        $id               = User::insertGetId($data);
//
//        if ($id) {
//            return redirect()->route('get.login');
//        }
//
//        return redirect()->back();
        $data               = $request->except("_token");
        $data['password']   = Hash::make($data['password']);
        $id = User::insertGetId($data);
        if($id){
            Session::flash('toastr', [
                'type'  => 'success',
                'message'  => 'Register Success'
            ]);
            Mail::to($request->email)->send(new RegisterSuccess($request->name));
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                return redirect()->intended('/');
            }
            return redirect()->route('get.login');
        }
        return redirect()->route('get.register');
    }

//    protected function validator(array $data)
//    {
//        return Validator::make($data, [
//            'name' => ['required', 'string', 'max:255'],
//            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
//            'password' => ['required', 'string', 'min:8', 'confirmed'],
//        ]);
//    }
//
//    /**
//     * Create a new user instance after a valid registration.
//     *
//     * @param  array  $data
//     * @return \App\User
//     */
//    protected function create(array $data)
//    {
//        return User::create([
//            'name' => $data['name'],
//            'email' => $data['email'],
//            'password' => Hash::make($data['password']),
//        ]);
//    }
}
