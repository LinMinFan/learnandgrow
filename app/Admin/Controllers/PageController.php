<?php

namespace App\Admin\Controllers;

use App\Models\Page;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use App\Admin\Action\ReplicatePage;
use Carbon\Carbon;

class PageController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected function title()
    {
        return __('Pages');
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Page());

        $grid->model()
            ->orderBy('created_at', 'asc');

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

            $filter->equal('status', __('Status'))
                ->select([
                    0 => __('Disable'),
                    1 => __('Enable'),
                ]);

        });

        $grid->column('title', __('Title'))
            ->display(function () {
                return sprintf('<a href="%s" target="_blank">%s</a>',
                url($this->slug),
                $this->title
                );
            });

        $grid->column('slug', __('Slug'));
        
        $states = [
            'on'  => ['value' => 1, 'text' => __('Disable'), 'color' => 'primary'],
            'off' => ['value' => 0, 'text' => __('Enable'), 'color' => 'danger'],
        ];

        $grid->column('status')->switch($states);
        

        $grid->column('updated_at', trans('admin.updated_at'))
            ->display(function ($updated_at) {
                $date = Carbon::parse($updated_at);
                return $date->format('Y-m-d');
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
        $form = new Form(new Page());

        $form->tools(function (Form\Tools $tools) {
            $tools->disableView();
        });

        $form->text('slug', __('Slug'))
            ->required()
            ->creationRules('unique:page|regex:/^[ A-Za-z0-9_-]*$/i')
            ->updateRules(["unique:page,slug,{{id}}", 'regex:/^[ A-Za-z0-9_-]*$/i']);

        $form->text('title', __('Title'))->required();
        $form->textarea('meta_keywords', __('Meta keywords'));
        $form->textarea('meta_description', __('Meta description'));
        $form->textarea('content', __('Content'));
        $form->image('image', __('Image'));

        $form->switch('status', __('Status'))
        ->states([
            'on'  => ['value' => 1, 'text' => __('Enable'), 'color' => 'success'],
            'off' => ['value' => 0, 'text' => __('Disable'), 'color' => 'danger'],
        ]);

        $form->footer(function ($footer) {
            $footer->disableViewCheck();
        });


        return $form;
    }
}
