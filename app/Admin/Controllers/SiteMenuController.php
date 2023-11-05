<?php

namespace App\Admin\Controllers;

use App\Models\Admin\SiteMenu;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Tree;
use Encore\Admin\Widgets\Box;
use App\Http\Controllers\Controller;

class SiteMenuController extends Controller
{

    use HasResourceActions;


    protected function title()
    {
        return __('Site menu');
    }

    /**
     * Index interface.
     *
     * @param Content $content
     *
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->title($this->title())
            ->description(trans('admin.list'))
            ->row(function (Row $row) {
                $row->column(6, $this->treeView()->render());

                $row->column(6, function (Column $column) {
                    $form = new \Encore\Admin\Widgets\Form();
                    $form->action(admin_url('site/menu'));

                    $menuModel = config('admin.database.site_menu_model');

                    $form->select('parent_id', trans('admin.parent_id'))->options($menuModel::selectOptions());
                    $form->text('title', trans('admin.title'))->rules('required');
                    $form->text('uri', trans('admin.uri'))
                        ->rules('required')
                        ->help(__('No need to enter URL :url Ex: page/about', ['url' => url('/')]));
                    $form->hidden('_token')->default(csrf_token());

                    $column->append((new Box(trans('admin.new'), $form))->style('success'));
                });
            });
    }

    /**
     * Redirect to edit page.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function show($id)
    {
        return redirect()->route('admin.menu.edit', ['menu' => $id]);
    }

    /**
     * @return \Encore\Admin\Tree
     */
    protected function treeView()
    {
        $menuModel = config('admin.database.site_menu_model');

        $tree = new Tree(new $menuModel());

        $tree->disableCreate();

        $tree->branch(function ($branch) {
            $title   = __($branch['title']);
            $payload = "<i class='fa fa-bars'></i>&nbsp;<strong>{$title}</strong>";

            if (!isset($branch['children'])) {
                if (url()->isValidUrl($branch['uri'])) {
                    $uri = $branch['uri'];
                } else {
                    // JACK 2023-10-30 無多語系調整路徑顯示
                    $uri = url('/' . $branch['uri']);
                    // $uri = url(app()->getLocale() . '/' . $branch['uri']);
                }

                $payload .= "&nbsp;&nbsp;&nbsp;<a href=\"$uri\" class=\"dd-nodrag\">$uri</a>";
            }

            return $payload;
        });

        return $tree;
    }

    /**
     * Edit interface.
     *
     * @param string  $id
     * @param Content $content
     *
     * @return Content
     */
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
        $menuModel = config('admin.database.site_menu_model');

        $form = new Form(new $menuModel());

        $form->display('id', 'ID');

        $form->select('parent_id', trans('admin.parent_id'))->options($menuModel::selectOptions());
        $form->text('title', trans('admin.title'))
            ->rules('required');
        $form->text('uri', trans('admin.uri'))
            ->rules('required')
            ->help(__('No need to enter URL :url Ex: page/about', ['url' => url('/')]));

        $form->display('created_at', trans('admin.created_at'));
        $form->display('updated_at', trans('admin.updated_at'));

        return $form;
    }

}
