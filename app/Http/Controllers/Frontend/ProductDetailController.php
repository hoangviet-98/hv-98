<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;
use App\Services\ProcessViewService;
use Illuminate\Support\Facades\DB;

class ProductDetailController extends FrontendController
{

    public function productDetail(Request $request)
    {
        $url = $request->segment(2);
        $url = preg_split('/(-)/i', $url);

        if ($id = array_pop($url))
        {
            $productDetail = Product::where('pro_active', Product::STATUS_PUBLIC)->find($id);

            $ratings = Rating::with('users:id,name')
                ->where('ra_product_id', $id)
                ->orderBy('id', "DESC")
                ->limit(5)
                ->get();

            $ratingStatistical = Rating::groupBy('ra_number')
                ->where('ra_product_id', $id)
                ->select(DB::raw('count(ra_number) as count_number'), DB::raw('sum(ra_number) as total'))
                ->addSelect('ra_number')
                ->get()->toArray();

            $ratingDefault = $this->mapRatingDefault();

                foreach($ratingStatistical as $key => $item) {
                    $ratingDefault[$item['ra_number']] = $item;
                }

            $viewData = [
                'ratingDefault'   => $ratingDefault,
                'productDetail'   => $productDetail,
                'productSuggests' => $this->getProductSuggests($productDetail->pro_category_id),
                'ratings'         => $ratings
            ];
            ProcessViewService::view('hv_product', 'pro_view', 'productDetail', $id);

            return view('frontend.pages.product_detail.index' ,$viewData);
        }
        return redirect()->to('/');
    }

    public function mapRatingDefault()
    {
        $ratingDefault = [];
        for ($i = 1; $i <= 5; $i ++){
            $ratingDefault[$i] = [
              "count_number"   => 0,
              "total"          => 0,
              "ra_number"      => 0
            ];
        }
        return $ratingDefault;
    }

    public function getProductSuggests ($categoryID)
    {
        $products = Product::where([
            'pro_category_id' => $categoryID,
            'pro_active'      => 1
        ])
            ->orderBy('id', 'DESC')
            ->select('id', 'pro_name', 'pro_slug', 'pro_avatar', 'pro_price')
            ->limit(4)
            ->get();

        return $products;
    }
}
