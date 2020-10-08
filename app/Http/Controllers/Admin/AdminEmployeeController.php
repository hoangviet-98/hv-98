<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Employee;
use App\Models\Spa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AdminEmployeeController extends Controller
{
    public function index()
    {
        $eid  = Auth::guard('admins')->user()->spa_id;
        $hv_employee  = Employee::where('emp_spa_id', '=',$eid)->paginate(10);

        $hv_spa = $this->getSpa();
        $viewData = [
        'hv_employee' => $hv_employee,
        'hv_spa'      => $hv_spa
        ];
        return view('admin.employees.index', $viewData);
    }

    public function create()
    {
        $hv_spa = $this->getSpa();
        return view('admin.employees.create', compact('hv_spa'));
    }

    public function getSpa()
    {
        return Spa::all();
    }

    public function store(Request $request)
    {
        $this->insertOrUpdate($request);
        return redirect()->route('admin.get.list.employee');
    }

    public function edit($id)
    {
        $hv_employee = Employee::find($id);
        $hv_spa = $this->getSpa();
        return view('admin.employees.edit', compact('hv_spa', 'hv_employee'));
    }

    public function insertOrUpdate($request, $id='')
    {
        $hv_employee = new Employee();
        if($id) $hv_employee = Employee::find($id);

        $hv_employee->emp_name        = $request->emp_name;
        $hv_employee->emp_address     = $request->emp_address;
        $hv_employee->emp_phone       = $request->emp_phone;
        $hv_employee->emp_salary      = $request->emp_salary;
        $hv_employee->emp_spa_id      = $request->emp_spa_id;

        if ($request->hasFile('emp_card'))
        {
            $file = upload_image('emp_card');
            if(isset($file['name']))
            {
                $hv_employee->emp_card = $file['name'];
            }
        }

        $hv_employee->save();
    }

    public function update(Request $request, $id)
    {
        $this->insertOrUpdate($request, $id);
        return redirect()->route('admin.get.list.employee');
    }
    public function delete($id)
    {
        try {
            Employee::find($id)->delete();
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
