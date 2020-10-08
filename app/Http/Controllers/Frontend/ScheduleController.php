<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\Spa;
use Illuminate\Http\Request;

class ScheduleController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $schedules = Schedule::all();
        $spa = $this->getSpa();

        return view('frontend.pages.schedule.index', compact('schedules', 'spa'));
    }

    public function getSpa()
    {
        return Spa::all();
    }

    public function saveInfoSchedule(Request $request)
    {
        $schedule = new Schedule();
        $schedule->s_name = $request->s_name;
        $schedule->s_phone = $request->s_phone;
        $schedule->s_email = $request->s_email;
        $schedule->s_service = $request->s_service;
        $schedule->s_spa_id = $request->s_spa_id;
        $schedule->s_user_id = get_data_user('web');
        $schedule->s_dateTime = $request->s_dateTime;
        $schedule->s_note = $request->s_note;

        $schedule->save();
        return redirect()->back();
    }

}
