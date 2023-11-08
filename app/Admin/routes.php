<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('site/menu', SiteMenuController::class);
    $router->resource('content/page', PageController::class);
    $router->resource('site/config', SiteController::class);
    $router->resource('content/slide', SlideController::class);
    $router->resource('content/portfolio', PortfolioController::class);

});
