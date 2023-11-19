<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;
use App\Models\Site;
use App\Models\Portfolio;

class LearnAndGrowProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // 使用 view composer
        view()->composer('*', function ($view) {
            $site = Site::first();
            $view->with('site', $site);
        });

        view()->composer('content.page.portfolio', function ($view) {
            $portfolios = Portfolio::all();
            $view->with('portfolios', $portfolios);
        });
    }
}
