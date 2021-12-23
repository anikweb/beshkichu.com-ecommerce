<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        Blade::withoutDoubleEncoding();
        View::share('recent_blogs',\App\Models\blog::orderBy('created_at','desc')->get());
        View::share('map',\App\Models\GoogleMap::find(1));
        View::share('size_guide_inches',\App\Models\SizeGuideInches::get());
        View::share('size_guide_cms',\App\Models\SizeGuideCm::get());
    }
}
