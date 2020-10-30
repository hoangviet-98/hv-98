<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Services\ProcessViewService;
use Illuminate\Http\Request;

class ArticleDetailController extends HomeController
{
    public function articleDetail(Request $request) {
        $url = $request->segment(2);
        $url = preg_split('/(-)/i', $url);

        if ($id = array_pop($url))
        {
            $articleDetail = Article::find($id);
            $viewData = [
                'articleDetail'   => $articleDetail,
            ];
            ProcessViewService::view('hv_article', 'a_view', 'articleDetail', $id);

            return view('frontend.pages.article_detail.index' ,$viewData);
        }
        return redirect()->to('/');
    }
}
