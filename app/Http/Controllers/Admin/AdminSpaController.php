<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Spa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminSpaController extends Controller
{
    public function index()
    {
        $hv_spa = Spa::all();
        return view('admin.spa.index', compact('hv_spa'));
    }


    public function create()
    {
        return view('admin.spa.create');
    }


    public function store(Request $request)
    {
        $hv_spa = new Spa([
            'spa_name' => $request->get('spa_name'),
            'spa_address' => $request->get('spa_address'),
            'spa_phone' => $request->get('spa_phone'),
            'spa_total_employee' => $request->get('spa_total_employee'),
        ]);
        $hv_spa->save();
        return redirect()->route('admin.get.list.spa')->with('success', 'Spa saved!');
    }

    public function edit($id)
    {
        $hv_spa = Spa::find($id);
        return view('admin.spa.edit', compact('hv_spa'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'spa_name' => 'required',
            'spa_address' => 'required',
            'spa_phone' => 'required'
        ]);

        $hv_spa = Spa::find($id);
        $hv_spa->spa_name = $request->get('spa_name');
        $hv_spa->spa_address = $request->get('spa_address');
        $hv_spa->spa_phone = $request->get('spa_phone');
        $hv_spa->spa_total_employee = $request->get('spa_total_employee');
        $hv_spa->save();

        return redirect('admin.get.list.spa')->with('success', 'Spa updated!');
    }

    public function delete($id)
    {
        try {
            Spa::find($id)->delete();
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

        return redirect('/admin/spas')->with('success', 'Spa deleted!');
    }
}
