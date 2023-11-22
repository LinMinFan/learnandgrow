<?php

namespace App\Admin\Controllers;

use App\Models\PostCategory;
use App\Models\Post;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Tree;
use Encore\Admin\Widgets\Box;
use App\Http\Controllers\Controller;
use Encore\Admin\Facades\Admin;

class PostCategoryController extends Controller
{

    use HasResourceActions;

    protected function title()
    {
        return __('Post categories');
    }

    public function index(Content $content)
    {
        return $content
            ->title($this->title())
            ->description(trans('admin.list'))
            ->row(function (Row $row) {
                $row->column(6, $this->treeView()->render());

                $row->column(6, function (Column $column) {
                    $form = new \Encore\Admin\Widgets\Form();
                    $form->action(admin_url('content/post-category'));

                    $form->select('parent_id', trans('admin.parent_id'))->options(PostCategory::selectOptions());

                    $form->text('slug', __('Slug'))
                        ->required()
                        ->creationRules('unique:post_category|regex:/^[ A-Za-z0-9_-]*$/i')
                        ->updateRules(["unique:post_category,slug,{{id}}", 'regex:/^[ A-Za-z0-9_-]*$/i']);

                    $form->text('title', __('Title'))->required();

                    $form->textarea('keywords', __('Meta keywords'));
                    $form->textarea('description', __('Meta description'));
                    $form->text('size', __('Size'))->default(15);
                    $form->hidden('_token')->default(csrf_token());

                    $column->append((new Box(trans('admin.new'), $form))->style('success'));
                });
            });
    }

    public function show($id)
    {
        return redirect()->route('admin.menu.edit', ['menu' => $id]);
    }

    protected function treeView()
    {

        $tree = new Tree(new PostCategory());

        $tree->disableCreate();

        $tree->branch(function ($branch) {
            return sprintf(
                '<strong class="tree-item"><i class="fa fa-bars"></i> %s</strong> <span class="badge bg-green">%s</span>',
                __($branch['title']),
                $branch['slug'],
            );
        });

        return $tree;
    }

    public function edit($id, Content $content)
    {
        return $content
            ->title($this->title())
            ->description(trans('admin.edit'))
            ->row($this->form()->edit($id));
    }


    /**
     * Make a form builder.
     *
     * @return Form
     */
    public function form()
    {

        $form = new Form(new PostCategory());

        $form->tools(function (Form\Tools $tools) {
            $tools->disableView();
        });

        $form->text('slug', __('Slug'))
            ->required()
            ->creationRules('unique:post_category|regex:/^[ A-Za-z0-9_-]*$/i')
            ->updateRules(["unique:post_category,slug,{{id}}", 'regex:/^[ A-Za-z0-9_-]*$/i']);

        $form->text('title', __('Title'))->required();

        $form->select('parent_id', trans('admin.parent_id'))->options(PostCategory::selectOptions());
        
        $form->textarea('keywords', __('Meta keywords'));
        $form->textarea('description', __('Meta description'));
        $form->text('size', __('Size'))->default(15);

        $form->display('created_at', trans('admin.created_at'));
        $form->display('updated_at', trans('admin.updated_at'));

        return $form;
    }
}
