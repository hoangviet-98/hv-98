<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestArticle;
use App\Models\Article;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminArticleController extends Controller
{
    public function index(Request $request)
    {
        $hv_article = Article::whereRaw(1);
        if ($request->name) $hv_article->where('a_name', 'like', '%' .$request->name. '%');
        $hv_article = $hv_article->paginate(5);
        $hv_menu = $this->getMenu();

        $viewData = [
            'hv_article' => $hv_article,
            'hv_menu'    => $hv_menu
        ];
        return view('admin.article.index' , $viewData);
    }

    public function create()
    {
        $hv_menu = $this->getMenu();
        return view('admin.article.create', compact('hv_menu'));
    }
    public function getMenu()
    {
        return Menu::all();
    }
    public function store(Request $request)
    {
        $this->insertOrUpdate($request);
        return redirect()->route('admin.get.list.article');
    }

    public function insertOrUpdate($request, $id='')
    {
        $hv_article                     = new Article();
        if($id) $hv_article             = Article::find($id);
        $hv_article->a_name             = $request->a_name;
        $hv_article->a_slug             = str_slug($request->a_name);
        $hv_article->a_description      = $request->a_description;
        $hv_article->a_content          = $request->a_content;
        $hv_article->a_description_seo  = $request->a_description_seo;
        $hv_article->a_title_seo        = $request->a_title_seo;
        $hv_article->a_menu_id          = $request->a_menu_id;

        if ($request->hasFile('a_avatar'))
        {
            $file = upload_image('a_avatar');
            if(isset($file['name']))
            {
                $hv_article->a_avatar = $file['name'];
            }
        }
        $hv_article->save();
    }

    public function edit($id)
    {
        $hv_article = Article::find($id);
        $hv_menu = $this->getMenu();
        return view('admin.article.edit', compact('hv_article', 'hv_menu'));
    }

    public function update(Request $request, $id)
    {
        $this->insertOrUpdate($request, $id);
        return redirect()->route('admin.get.list.article');
    }

    public function delete($id)
    {
        try {
            Article::find($id)->delete();
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
}
