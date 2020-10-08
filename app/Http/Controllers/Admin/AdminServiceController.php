<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Spa;
class AdminServiceController extends Controller
{
    public function index()
    {
        $hv_service = Service::paginate(10);

        $viewData = [
            'hv_service' => $hv_service
        ];
        return view('admin.service.index', $viewData);
    }

    public function create()
    {
        $hv_spa = $this->getSpa();
        return view('admin.service.create', compact('hv_spa'));
    }

    public function getSpa()
    {
        return Spa::all();
    }

    public function store(Request $request)
    {
        $hv_service = new Service();

        $hv_service->se_name = $request->se_name;
        $hv_service->se_spa_id = $request->se_spa_id;

        $hv_service->save();
        return redirect()->route('admin.get.list.service');
    }

    
}
