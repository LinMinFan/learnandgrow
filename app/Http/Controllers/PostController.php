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
    public function index(Request $request,$slug,$sub = null)
    {
        $view = 'content.post_category';

        $content = PostCategory::with('posts')->where('slug',$slug)->first();

        if (view()->exists($view) && $content) {

            $children = $content->children;

            if ($sub) {
                $postsCategory = PostCategory::where('slug', $sub)->first();
                if ($postsCategory) {
                    $posts = $postsCategory->posts()->paginate($content->size);
                }else {
                    abort(404);
                }
                
            }else {
                // 獲取所有 children 的文章 ID
                $postIds = $content->children->flatMap(function ($child) {
                    return $child->posts->pluck('id');
                });

                // 使用 Eloquent 查詢生成的分頁實例
                $posts = Post::whereIn('id', $postIds)->paginate($content->size);
            }

            

            return view($view,compact('content','children','posts','sub'));
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