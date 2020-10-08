<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestCategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $hv_categories = Category::paginate(5);
        $viewData = [
            'hv_categories' => $hv_categories
        ];
        return view('admin.categories.index', $viewData, compact('hv_categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(RequestCategory $requestCategory)
    {
        $this->insertOrUpdate($requestCategory);
        return redirect()->route('admin.get.list.category');
    }

    public function insertOrUpdate($requestCategory, $id='')
    {
        $hv_categories                  = new Category();
        if($id) $hv_categories = Category::find($id);

        $hv_categories->cat_name        = $requestCategory->cat_name;
        $hv_categories->cat_slug        = str_slug($requestCategory->cat_name);
        $hv_categories->cat_description = $requestCategory->cat_description;
        $hv_categories->save();

    }

    public function edit($id)
    {
        $hv_categories = Category::find($id);
        return view('admin.categories.edit', compact('hv_categories'));
    }
    public function update( RequestCategory $requestCategory, $id)
    {
        $this->insertOrUpdate($requestCategory, $id);
        return redirect()->route('admin.get.list.category');

    }

    public function delete($id)
    {
        try {
            Category::find($id)->delete();
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

    public function action($action, $id)
    {
        if ($action)
        {
            $hv_categories = Category::find($id);
            switch ($action)
            {
//                case 'delete':
//                    $hv_categories->delete();
//                    break;
                case 'active':
                    $hv_categories->cat_active = $hv_categories->cat_active ? 0 : 1;
                    break;
            }
            $hv_categories->save();
        }
        return redirect()->route('admin.get.list.category');
    }
}
