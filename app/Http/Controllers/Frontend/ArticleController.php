<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getListArticle()
    {
        $articles = Article::all();
        return view('frontend.pages.article.index', compact('articles'));
    }
}

