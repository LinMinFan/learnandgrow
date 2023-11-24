<?php

namespace App\Admin\Controllers;

use App\Models\Form as ModelForm;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class FormController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '聯絡表單';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new ModelForm());

        $grid->model()
            ->orderBy('created_at', 'asc');

        $grid->disableExport();
        $grid->disableRowSelector();

        $grid->actions(function ($actions) {
            $actions->disableEdit();
        });

        $grid->filter(function ($filter) {

            $filter->disableIdFilter();

            $filter->where(function ($query) {
                $query->where('subject', 'like', "%{$this->input}%")
                    ->orWhere('name', 'like', "%{$this->input}%")
                    ->orWhere('email', 'like', "%{$this->input}%");
            }, __('Keywords'))->placeholder(__('Title, Content'));

        });

        $grid->column('subject', __('Subject'));
        $grid->column('name', __('Name'));
        $grid->column('email', __('Email'));
        $grid->column('created_at', __('Created at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(ModelForm::findOrFail($id));

        $show->panel()
            ->tools(function ($tools) {
                $tools->disableEdit();
                $tools->disableDelete();
            });

        $show->field('subject', __('Subject'));
        $show->field('name', __('Name'));
        $show->field('email', __('Email'));
        $show->field('content', __('Content'));
        $show->field('created_at', __('Created at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new ModelForm());

        $form->text('subject', __('Subject'));
        $form->text('name', __('Name'));
        $form->email('email', __('Email'));
        $form->textarea('content', __('Content'));

        return $form;
    }
}
