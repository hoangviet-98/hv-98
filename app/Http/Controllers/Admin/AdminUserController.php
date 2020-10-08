<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminUserController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $users = User::paginate(10);

        $viewData = [
            'users' => $users
        ];
        return view('admin.user.index', $viewData);
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
//        try {
//            DB::beginTransaction();
        $user = $this->user->create([
            'name' => $request->name,
            'spa_id' => $request->spa_id,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->roles()->attach($request->role_id);
//            DB::commit();
        return redirect()->route('admin.get.list.user');
//        } catch(\Exception $exception){
//            DB::rollBack();
//            Log::errors('Message :' . $exception->getMessage() . '--- Line: ' .$exception->getLine());


    }

    public function edit($id)
    {
        $user = $this->user->find($id);
        return view('admin.user.edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $this->user->find($id)->update([
                'name' => $request->name,
                'spa_id' => $request->spa_id,
                'email' => $request->email,
//                'password' => Hash::make($request->password)
            ]);
            $user = $this->user->find($id);
            $user->roles()->sync($request->role_id);
            DB::commit();
            return redirect()->back();
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message :' . $exception->getMessage() . '--- Line: ' . $exception->getLine());
        }
    }

    public function delete($id)
    {
        try {
            $this->user->find($id)->delete();
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
