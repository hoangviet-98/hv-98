<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequestUpdateInfo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserInfoController extends Controller
{
    public function updateInfo()
    {
        return view('user.update_info');
    }

    public function saveUpdateInfo(UserRequestUpdateInfo $request)
    {
        $data = $request->except('_token');
        $user = User::find(Auth::id());
        $user->update($data);

        Session::flash('toastr', [
            'type'          => 'success',
            'message'       => 'Update Information Successfully'
        ]);

        return redirect()->back();
    }
}
