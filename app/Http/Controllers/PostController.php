<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Encore\Admin\Facades\Admin;
use App\Models\Post;
use App\Models\PostCategory;

class PostController extends Controller
{

    /**
     * 文章列表
     *
     * @param  Request $request
     * @return View
     */
    public function index(Request $request,$slug)
    {
        $view = 'content.post_category';

        $content = PostCategory::with('posts')->where('slug',$slug)->first();

        if (view()->exists($view) && $content) {

            $children = $content->children;


            return view($view,compact('content','children'));
        }
        
        abort(404);

    }

    /**
     * 文章內頁
     *
     * @param  Request $request;
     * @return View
     */
    public function show(Request $request,$slug)
    {
        
    }
}