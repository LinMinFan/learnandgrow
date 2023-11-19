<?php

namespace App\Admin\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use App\Admin\Action\ReplicatePage;
use Carbon\Carbon;

class PostController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected function title()
    {
        return __('Posts');
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Post());

        $grid->model()
            ->orderBy('top', 'DESC')
            ->orderBy('sort', 'asc')
            ->orderBy('published_at', 'DESC')
            ->with(['categories']);

        $grid->disableExport();
        $grid->disableRowSelector();

        $grid->actions(function ($actions) {
            $actions->disableView();
            $actions->add(new ReplicatePage);
        });

        $grid->filter(function ($filter) {

            $filter->disableIdFilter();

            $filter->where(function ($query) {
                $query->where('title', 'like', "%{$this->input}%")
                    ->orWhere('content', 'like', "%{$this->input}%")
                    ->orWhere('slug', 'like', "%{$this->input}%");
            }, __('Keywords'))->placeholder(__('Title, Content'));


            $categories = PostCategory::where('parent_id','!=',0)
                            ->pluck('title', 'id')
                            ->toArray();

            $filter->where(function ($query) {
                foreach ($this->input as $key => $value) {
                    $query->whereHas('categories', function ($query) use ($key) {
                        $query->where('category_id', $key);
                    });
                }
            }, __('Category'), 'category_id')->multipleSelect($categories);

            $filter->equal('status', __('Status'))
                ->select([
                    0 => __('Disable'),
                    1 => __('Enable'),
                    3 => __('Scheduled Publishing'),
                ]);

        });

        $grid->column('categories', __('Post categories'))
            ->pluck('title')
            ->label();

        $grid->column('title', __('Title'));
        
        $states = [
            'on'  => ['value' => 1, 'text' => __('Disable'), 'color' => 'primary'],
            'off' => ['value' => 0, 'text' => __('Enable'), 'color' => 'danger'],
        ];

        $grid->column('status')->switch($states);

        $grid->column('sort', __('Sort'))
            ->editable()
            ->sortable();
        

        $grid->column('published_at', __('Published at'))
            ->display(function ($published_at) {
                $date = Carbon::parse($published_at);
                return $date->format('Y-m-d H:i');
            });


        return $grid;
    }


    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Post());

        $form->text('slug', __('Slug'))
            ->creationRules(['unique:post', 'regex:/^[ A-Za-z0-9_-]*$/i'])
            ->updateRules(["unique:post,slug,{{id}}", 'regex:/^[ A-Za-z0-9_-]*$/i']);

        $categories = PostCategory::where('parent_id','!=',0)
                        ->pluck('title', 'id')
                        ->toArray();

        $form->multipleSelect('categories', __('Post categories'))
            ->options($categories)
            ->required();
        
        $form->text('title', __('Title'))->required();
        $form->textarea('meta_keywords', __('Meta keywords'));
        $form->textarea('meta_description', __('Meta description'));
        $form->textarea('content', __('Content'));
        $form->image('image', __('Image'))->removable();
        $form->text('tag', __('Tag'));

        $form->number('sort', __('Sort'))
            ->min(1)
            ->default(Post::whereNull('deleted_at')
            ->count() + 1);

        $form->datetime('published_at', __('Published at'))
        ->help(__('Scheduled help'));

        $form->switch('top', __('Top'))
            ->states([
                'on'  => ['value' => 1, 'text' => __('Yes'), 'color' => 'success'],
                'off' => ['value' => 0, 'text' => __('No'), 'color' => 'danger'],
            ]);

        $form->switch('status', __('Status'))
            ->states([
                'on'  => ['value' => 1, 'text' => __('Enable'), 'color' => 'success'],
                'off' => ['value' => 0, 'text' => __('Disable'), 'color' => 'danger'],
            ]);


        $form->saving(function (Form $form) {
    
            $now          = \Carbon\Carbon::now();
            $published_at = \Carbon\Carbon::parse($form->published_at);
    
            if ($form->status != 'on' && $form->published_at) {
                $form->status = ($published_at->lt($now)) ? 0 : 3;
            }
            
            if ($form->status == 'on' && !$form->published_at) {
                    $form->published_at = $now;
            }
        });

        return $form;
    }
}
