<?php

namespace App\Admin\Controllers;

use App\Models\Admin\Slide;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Storage;
class SlideController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected function title()
    {
        return __('Slide');
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Slide());

        $grid->model()->orderBy('sort', 'asc');

        $grid->disableExport();
        $grid->disableRowSelector();

        $grid->disableFilter();

        $grid->actions(function ($actions) {
            $actions->disableView();
        });

        $grid->column('title', __('Title'));
        $grid->column('image', __('Image'))
            ->display(function($image) {
                return sprintf('<img class="thumbnail" src="%s" style="%s">',
                $image ? Storage::url($image) : asset('img/noimage.jpg'),
                    'max-width:150px'
                );
            });
        $grid->column('mobile_image', __('Mobile image'))
            ->display(function($mobile_image) {
                return sprintf('<img class="thumbnail" src="%s" style="%s">',
                $mobile_image ? Storage::url($mobile_image) : asset('img/noimage.jpg'),
                'max-width:150px'
                );
            });
        $grid->column('label', __('Label'))
            ->display(function() {
                return sprintf('<a href="%s" target=”_blank”>%s</a>',
                    $this->url,
                    $this->label
                );
            });

        $grid->column('sort', __('Sort'))
            ->editable();

        return $grid;
    }


    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Slide());

        $form->tools(function (Form\Tools $tools) {
            $tools->disableView();
        });

        $form->text('title', __('Title'));
        $form->textarea('description', __('Description'));
        $form->image('image', __('Image'))
            ->removable();
        $form->image('mobile_image', __('Mobile image'))
            ->removable();
        $form->text('label', __('Label'));
        $form->url('url', __('Url'));
        $form->number('sort', __('Sort'))->default(1);

        return $form;
    }
}
