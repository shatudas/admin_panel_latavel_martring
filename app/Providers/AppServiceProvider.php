<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\About;
use App\Models\Term;


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
     $about_data = About::first();
     $term_data = Term::first();
     view()->share('global_page',$about_data);
     view()->share('term_page',$term_data);

    }
}
