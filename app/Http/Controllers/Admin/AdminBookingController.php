<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Spa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use SebastianBergmann\Comparator\Book;

class AdminBookingController extends Controller
{
    public function index(Request $request)
    {
        $booking = Booking::whereRaw(1);
        if ($request->id) $booking->where('id', $request->id);
        $booking = $booking->orderByDesc('id')->paginate(10);
        return view('admin.booking.index', compact('booking'));
    }

    public function create()
    {
        $spa = $this->getSpa();
        return view('admin.booking.create', compact('spa'));
    }

    public function getSpa()
    {
        return Spa::all();
    }

    public function store(Request $request)
    {
        $this->insertOrUpdate($request);
        return redirect()->route('admin.get.list.booking');
    }

    public function insertOrUpdate($request, $id='')
    {
        $booking                  = new Booking();
        if($id) $booking = Booking::find($id);
        $booking->customer_name = $request->customer_name;
        $booking->date_time = $request->date_time;
        $booking->b_content = $request->b_content;
        $booking->spa_id = $request->spa_id;
        $booking->note = $request->note;
        $booking->save();

    }
    public function edit($id)
    {
        $booking = Booking::find($id);
        $spa = $this->getSpa();
        return view('admin.booking.edit', compact('booking','spa'));
    }
    public function update(Request $request, $id)
    {
        $this->insertOrUpdate($request, $id);
        return redirect()->route('admin.get.list.booking');
    }
    public function delete($id)
    {
        try {
            Booking::find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ], 200);

        } catch (\Exception $exception) {
            Log::error('message: ' . $exception->getMessage() . ' --- Line : ' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], 500);
        }
    }
}

