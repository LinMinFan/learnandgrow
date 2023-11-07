<?php

/**
 * Laravel-admin - admin builder based on Laravel.
 * @author z-song <https://github.com/z-song>
 *
 * Bootstraper for Admin.
 *
 * Here you can remove builtin form field:
 * Encore\Admin\Form::forget(['map', 'editor']);
 *
 * Or extend custom form field:
 * Encore\Admin\Form::extend('php', PHPEditor::class);
 *
 * Or require js and css assets:
 * Admin::css('/packages/prettydocs/css/styles.css');
 * Admin::js('/packages/prettydocs/js/main.js');
 *
 */

Encore\Admin\Form::forget(['map', 'editor']);

/**
 * 覆蓋`admin`命名空間下的視圖
 */
app('view')->prependNamespace('admin', resource_path('views/admin'));

// 左邊導覽前往網站
Admin::navbar(function ($navbar) {
    $siteUrl = config('app.url');
    $navbar->left(view('admin.nav.site-link', compact('siteUrl')));
});
