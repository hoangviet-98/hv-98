<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserTransactionController extends Controller
{
    public function index(Request $request)
    {
        $transactions = Transaction::whereRaw(1)->where('tr_user_id', Auth::id());
        if($request->id) $transactions->where('id', $request->id);

        if($email=$request->email) {
            $transactions->where('tr_email','like','%',$email.'%');
        }

        if($type = $request->type) {
            if ($type == 1)
            {
                $transactions->where('tr_user_id', '<>', 0);
            } else {
                $transactions->where('tr_user_id', 0);
            }
        }
        if($status = $request->status) {
            $transactions->where('tr_status', $status);
        }
        $transactions = $transactions->orderByDesc('id')->paginate(10);

        $viewData = [
          'transactions'  => $transactions,
            'query'       => $request->query()
         ];
        return view('user.transactions', $viewData);
    }
}
