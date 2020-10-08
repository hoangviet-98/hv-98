<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\OrderShipped;
use App\Models\Article;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class HomeController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function error_page()
    {
        return view('errors.404');
    }
    public function index()
    {
//        Mail::to('hoangviet180498@gmail.com')->send(new OrderShipped());
        $productsNew = Product::where('pro_active', 1)
            ->orderByDesc('id')
            ->limit(4)
            ->select('id', 'pro_name', 'pro_slug', 'pro_avatar', 'pro_price')
            ->get();
        $productHot = Product::where([
            'pro_hot' => Product::HOT_ON,
            'pro_active' => Product::STATUS_PUBLIC
        ])->limit(10)->get();
        $articleNews = Article::orderBy('id', 'DESC')->limit(6)->get();
        $viewData = [
            'productsNew' => $productsNew,
            'productHot' => $productHot,
            'articleNews' => $articleNews

        ];
        return view('frontend.pages.home.index', $viewData);
    }
}
