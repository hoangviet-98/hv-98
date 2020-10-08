<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestProduct;
use App\Models\Category;
use App\Models\Product;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    public function index(Request $request)
    {
        $hv_product = Product::with('category:id,cat_name');
        if ($request->name) $hv_product->where('pro_name', 'like', '%' . $request->name . '%');
        if ($request->cat) $hv_product->where('pro_category_id', $request->cat);
        $hv_product = $hv_product->orderByDesc('id')->paginate(5);
        $hv_category = $this->getCategories();

        $viewData = [
            'hv_product' => $hv_product,
            'hv_category' => $hv_category
        ];
        return view('admin.products.index',$viewData, compact('hv_product'));
    }
    public function getCategories()
    {
        return Category::all();
    }
    public function create()
    {
        $hv_category = $this->getCategories();
        return view('admin.products.create', compact('hv_category'));
    }

    public function store(RequestProduct  $requestProduct)
    {
        $this->insertOrUpdate($requestProduct);
        return redirect()->route('admin.get.list.product');
    }

    public function edit($id)
    {
        $hv_product = Product::find($id);
        $hv_category = $this->getCategories();
        return view('admin.products.edit', compact('hv_product', 'hv_category'));
    }

    public function insertOrUpdate($requestProduct, $id='')
    {
        $hv_product = new Product();
        if($id) $hv_product = Product::find($id);
        $hv_product->pro_name               = $requestProduct->pro_name;
        $hv_product->pro_slug               = str_slug($requestProduct->pro_name);
        $hv_product->pro_category_id        = $requestProduct->pro_category_id;
        $hv_product->pro_price        = $requestProduct->pro_price;
//        $hv_product->pro_active             = $requestProduct->pro_active;
//        $hv_product->pro_hot                = $requestProduct->pro_hot;
//        $hv_product->pro_view               = $requestProduct->pro_view;
        $hv_product->pro_description        = $requestProduct->pro_description;
        $hv_product->pro_description_seo    = $requestProduct->pro_description_seo;
        $hv_product->pro_content            = $requestProduct->pro_content;
        $hv_product->pro_number             = $requestProduct->pro_number;

        if ($requestProduct->hasFile('pro_avatar'))
        {
            $file = upload_image('pro_avatar');
            if(isset($file['name']))
            {
                $hv_product->pro_avatar = $file['name'];
            }
        }
        $hv_product->save();

    }
    public function update(RequestProduct $requestProduct, $id)
    {
        $this->insertOrUpdate($requestProduct, $id);
        return redirect()->route('admin.get.list.product');
    }

    public function delete($id)
    {
        try {
            Product::find($id)->delete();
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
            $hv_product = Product::find($id);
            switch ($action)
            {
                case 'active':
                    $hv_product->pro_active = $hv_product->pro_active ? 0 : 1;
                    break;
                case 'hot':
                    $hv_product->pro_hot = $hv_product->pro_hot ? 0 : 1;
                    break;
            }
            $hv_product->save();
        }
        return redirect()->back();
    }
}
