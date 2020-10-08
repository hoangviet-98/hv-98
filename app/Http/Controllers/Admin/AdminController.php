<?php

namespace App\Http\Controllers\Admin;

use App\HelpersClass\Date;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Employee;
use App\Models\Product;
use App\Models\Schedule;
use App\Models\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboardAdmin()
    {
        // Super Admin
        $totalTransactions = Transaction::select('id')->count();
        $transactions = Transaction::paginate(10);
        // Thong ke trang thai don hang
        $transactionDefault = Transaction::where('tr_status', 0)->select('id')->count();
        $transactionProcess = Transaction::where('tr_status', 1)->select('id')->count();
        $transactionSuccess = Transaction::where('tr_status', 2)->select('id')->count();
        $transactionCancel = Transaction::where('tr_status', -1)->select('id')->count();

        //Admin Role 2

        $sid = Auth::guard('admins')->user()->spa_id;

        $transactionsAdmin = Transaction::where('tr_spa_id', '=', $sid)->paginate(10);
        $employeeAdmin = Employee::where('emp_spa_id', '=', $sid)->count();
        $totalTransactionsAdmin = Transaction::where('tr_spa_id', '=', $sid)->count();
        $totalSchedules = Schedule::where('s_spa_id', '=', $sid)->paginate(10);

        $statusTransaction = [
            [
                'Delivered', $transactionSuccess, false
            ],
            [
                'Transported', $transactionProcess, false
            ],
            [
                'Pending' , $transactionDefault, false
            ],
            [
                'Cancelled' , $transactionCancel, false
            ],
        ];
        //total article
        $totalArticles = Article::select('id')->count();

        //total user
        $totalUsers = User::select('id')->count();

        //List transactions.blade.php Admin
//        $transactions = Transaction::orderByDesc('id')
//                        ->limit(5)
//                        ->get();
        // List Top View Product
        $topProduct = Product::orderByDesc('pro_view')
            ->limit(5)
            ->get();
        $listDay = Date::getListDayInMonth();
        //Doanh thu theo thang done
        $revenueTransactionMonth = Transaction::where('tr_status', 2)
            ->whereMonth('created_at',date('m'))
            ->select(DB::raw('sum(tr_total) as totalMoney'), DB::raw('DATE(created_at) day'))
            ->groupBy('day')
            ->get()->toArray();
//        dump($revenueTransactionMonth);
        //receive
        $revenueTransactionMonthDefault  = Transaction::where('tr_status', 0)
            ->whereMonth('created_at',date('m'))
            ->select(DB::raw('sum(tr_total) as totalMoney'), DB::raw('DATE(created_at) day'))
            ->groupBy('day')
            ->get()->toArray();
        $arrRevenueTransactionMonth = [];
        $arrRevenueTransactionMonthDefault = [];
        foreach ($listDay as $day) {
            $total = 0;
            foreach ($revenueTransactionMonth as $key => $revenue) {
               if ($revenue['day'] == $day) {
                   $total = $revenue['totalMoney'];
                   break;
               }
            }
            $arrRevenueTransactionMonth[] = (int)$total;
        }

        foreach ($listDay as $day) {
            $total = 0;
            foreach ($revenueTransactionMonthDefault as $key => $revenue) {
                if ($revenue['day'] == $day) {
                    $total = $revenue['totalMoney'];
                    break;
                }
            }
            $arrRevenueTransactionMonthDefault[] = (int)$total;
        }

        $viewData = [
            'totalTransactions'             => $totalTransactions,
            'totalArticles'                 => $totalArticles,
            'totalUsers'                    => $totalUsers,
            'transactions'                  => $transactions,
            'topProduct'                    => $topProduct,
            'totalSchedules'                => $totalSchedules,
            'statusTransaction'             => json_encode($statusTransaction),
            'listDay'                       => json_encode($listDay),
            'arrRevenueTransactionMonth'    => json_encode($arrRevenueTransactionMonth),
            'arrRevenueTransactionMonthDefault'    => json_encode($arrRevenueTransactionMonthDefault),

            //Admin
            'totalTransactionsAdmin' => $totalTransactionsAdmin,
            'transactionsAdmin' => $transactionsAdmin,
            'employeeAdmin' => $employeeAdmin,


        ];
        return view('admin.home', $viewData);
    }
}
