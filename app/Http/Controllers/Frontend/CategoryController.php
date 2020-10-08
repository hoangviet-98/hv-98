<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends FrontendController
{

    public function getListProduct(Request $request)
    {
        $url = $request->segment(2);
        $url = preg_split('/(-)/i', $url);

        if($id = array_pop($url));
        {
            $products = Product::where([
                'pro_category_id' => $id,
                'pro_active'      => Product::STATUS_PUBLIC
            ])->orderBy('id', 'DESC')->paginate(10);

            $cateProduct = Category::find($id);

            $viewData = [
                'products' => $products,
                'cateProduct' => $cateProduct
            ];
            return view('frontend.pages.product.index', $viewData);
        }
    }
}
