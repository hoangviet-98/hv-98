<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $products = Product::all();
        return view('frontend.pages.product.index', compact('products'));
    }

    public function getProductHot()
    {
        $productHot = Product::where([
            'pro_hot' => Product::HOT_ON,
            'pro_active' => Product::STATUS_PUBLIC
        ])->limit(10)->get();
        $viewData = [
            'productHot' => $productHot
        ];
        return view('pages.home', $viewData);
    }
}
