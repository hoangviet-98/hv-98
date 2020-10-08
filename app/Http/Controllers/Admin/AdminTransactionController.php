<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminTransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::paginate(5);

        $sid =  Auth::guard('admins')->user()->spa_id;
        $transactionsAdmin =  Transaction::where('tr_spa_id','=', $sid)->paginate(10);
        $viewData = [
            'transactions' => $transactions,
            'transactionsAdmin' => $transactionsAdmin,
        ];
        return view('admin.transaction.index', $viewData);
//        if(Auth::guard('admins')->user()->role_id!=2) return abort('404');
//        $id = Auth::id();
//        $transactions = Transaction::where('tr_spa_id', $id)->orderBy('created_at')->paginate(10);
//        return view('admin.transactions.blade.php.index', compact('transactions'));
    }

    public function getTransactionDetail(Request $request, $id)
    {
        if ($request->ajax()) {
            $orders = Order::where('or_transaction_id', $id)->get();
            $html = view("components.orders", compact('orders'))->render();

            return response([
                'html' => $html
            ]);
        }
    }

    public function deleteOrderItem(Request $request, $id)
    {
        if($request->ajax()) {
            $order = Order::find($id);
            if ($order) {
                $money = $order->or_quantity * $order->or_price;

                DB::table('hv_transactions')
                    ->where('id', $order->or_transaction_id)
                    ->decrement('tr_total', $money);
                $order->delete();
             }
            return response(['code' => 200]);
        }
    }

    public function action($action, $id)
    {
        if ($action)
        {
            $transactions = Transaction::find($id);
            switch ($action)
            {
                case 'process':
                    $transactions->tr_status = 1;
                    break;
                case 'success':
                    $transactions->tr_status = 2;
                    break;
                case 'cancel':
                    $transactions->tr_status = -1;
                    break;
            }
            $transactions->save();
        }
        return redirect()->back();
    }
    public function delete($id)
    {
        try {
            Transaction::find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ], 200);

        } catch (\Exception $exception) {
            Log::error('message: ' . $exception->getMessage() . ' --- Line : ' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ],500);
        }
    }
}
