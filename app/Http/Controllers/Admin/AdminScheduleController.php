<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AdminScheduleController extends Controller
{
    public function index(Request $request)
    {
        $sid = Auth::guard('admins')->user()->spa_id;
        $schedulesAdmin = Schedule::where('s_spa_id', '=', $sid)->paginate(10);

        $schedules = Schedule::whereRaw(1);
        if ($request->id) $schedules->where('id', $request->id);
        if ($request->email) $schedules->where('s_email', 'like', '%' . $request->email . '%');

        $schedules = $schedules->orderByDesc('id')->paginate(10);

        $viewData = [
            'schedules' => $schedules,
            'schedulesAdmin' => $schedulesAdmin
        ];
        return view('admin.schedule.index', $viewData);
    }

    public function delete($id)
    {
        try {
            Schedule::find($id)->delete();
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

    public function action($action, $id)
    {
        if ($action)
        {
            $schedules = Schedule::find($id);
            switch ($action)
            {
                case 'process':
                    $schedules->s_status = 1;
                    break;
                case 'cancel':
                    $schedules->s_status = 2;
                    break;
            }
            $schedules->save();
        }
        return redirect()->back();
    }
}
