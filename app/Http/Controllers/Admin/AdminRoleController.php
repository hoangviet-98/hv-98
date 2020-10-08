<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminRoleController extends Controller
{
    private $role;
    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function index()
    {
        $role = $this->role->paginate(10);
        return view('admin.role.index', compact('role'));
    }
    public function create()
    {
        $role = $this->role->all();
        return view('admin.role.create', compact( 'role'));
    }

    public function store(Request $request)
    {
        $role = $this->role->create([
            'name' => $request->name,
            'display_name' => $request->display_name,
        ]);
        return redirect()->route('admin.get.list.role', compact('role'));
    }
    public function edit($id)
    {
        $role = $this->role->find($id);
        return view('admin.role.edit', compact( 'role' ));
    }
    public function update(Request $request, $id)
    {
        $role = $this->role->find($id);
        $role->update([
            'name' => $request->name,
            'display_name' => $request->display_name
        ]);

        $role->permissions()->sync($request->permission_id);
        return redirect()->route('admin.get.list.role');
    }
    public function delete($id)
    {
        try {
            $this->role->find($id)->delete();
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
