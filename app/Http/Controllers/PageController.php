<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Page;
use Encore\Admin\Facades\Admin;

class PageController extends Controller
{

    public function show(Request $request)
    {
        $name = $request->route()->parameters['name'];

        if ($name == 'index') {
            return view('index');
        }

        $content = Page::where('slug',$name)->first();

        if ($content) {
            if (!Admin::guard()->check() && !$content->status) {
                abort(404);
            }
            
            $view = 'content.page.'. $name;

            return view($view)
                ->with(compact('content'));
        } else {
            $view = 'content.' . $name;

            if (view()->exists($view)) {
                return view($view);
            }
        }

        abort(404);
    }
}
