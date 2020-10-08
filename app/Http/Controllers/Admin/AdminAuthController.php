<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestAdmin;
use App\Models\Admin;
use App\Models\Role;
use App\Models\Spa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminAuthController extends Controller
{
    private $admins;
    private $role;
    private $spa;

    public function __construct(Admin $admins, Role $role, Spa $spa)
    {
        $this->admins = $admins;
        $this->role = $role;
        $this->spa = $spa;
    }
    public function index()
    {

        $admins = Admin::all();
        $role = $this->getRoles();

        $viewData = [
            'admins' => $admins,
            'role' => $role,

        ];
        return view('admin.admins.index', $viewData);
    }


    public function getSpa()
    {
        return Spa::all();
    }

    public function getRoles()
    {
        return Role::all();
    }

    public function create()
    {
        $spa = $this->getSpa();
        $role = $this->getRoles();
        return view('admin.admins.create', compact('role', 'spa'));
    }

    public function store(RequestAdmin $requestAdmin)
    {
        $admins = $this->admins->create([
            'name' => $requestAdmin->name,
            'spa_id' => $requestAdmin->spa_id,
            'email' => $requestAdmin->email,
            'role_id' => $requestAdmin->role_id,
            'phone' => $requestAdmin->phone,
            'password' => Hash::make($requestAdmin->password),
            ]);
//        $admins->role()($requestAdmin->role_id);
        return redirect()->route('admin.get.list.admin');
    }
    public function edit($id)
    {
        $admins = $this->admins->find($id);
        $spa = $this->getSpa();
        $roles = $this->getRoles();
        $roleOfUser = $admins->roles;
        return view('admin.admins.edit', ['admins' => $admins,'spa' => $spa ,'role' => $roles, 'roleOfUser' => $roleOfUser]);
    }

    public function update(RequestAdmin $requestAdmin, $id)
    {
            $this->admins->find($id)->update([
                'name' => $requestAdmin->name,
                'spa_id' => $requestAdmin->spa_id,
                'email' => $requestAdmin->email,
                'role_id' => $requestAdmin->role_id,
                'phone' => $requestAdmin->phone,
//                'password' => Hash::make($request->password)
            ]);
            $admins = $this->admins->find($id);
            $admins->role()->sync($requestAdmin->role_id);
            return redirect()->route('admin.get.list.admin', compact('role'));
    }


    public function delete($id)
    {
        try {
            $this->admins->find($id)->delete();
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
