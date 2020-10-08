<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminRatingController extends Controller
{
    public function index()
    {
        $ratings = Rating::paginate(10);

        $viewData = [
            'ratings'  => $ratings
        ];
        return view('admin.rating.index', $viewData);
    }

    public function delete($id)
    {
        try {
            Rating::find($id)->delete();
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
