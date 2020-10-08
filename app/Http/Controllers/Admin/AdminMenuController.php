<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestMenu;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminMenuController extends Controller
{
    public function index()
    {
        $hv_menu = Menu::paginate(10);
        $viewData = [
            'hv_menu' => $hv_menu
        ];
        return view('admin.menu.index', $viewData);
    }
    public function create()
    {
        return view('admin.menu.create');
    }

    public function store(RequestMenu $requestMenu)
    {
        $this->insertOrUpdate($requestMenu);
        return redirect()->route('admin.get.list.menu');
    }

    public function insertOrUpdate($request, $id='')
    {
        $hv_menu                  = new Menu();
        if($id) $hv_menu = Menu::find($id);

        $hv_menu->mu_name        = $request->mu_name;
        $hv_menu->mu_slug        = str_slug($request->mu_name);
        $hv_menu->mu_description = $request->mu_description;

        $hv_menu->save();

    }

    public function edit($id)
    {
        $hv_menu = Menu::find($id);
        return view('admin.menu.edit', compact('hv_menu'));
    }
    public function update( Request $request, $id)
    {
        $this->insertOrUpdate($request, $id);
        return redirect()->route('admin.get.list.menu');

    }

    public function delete($id)
    {
        try {
            Menu::find($id)->delete();
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

