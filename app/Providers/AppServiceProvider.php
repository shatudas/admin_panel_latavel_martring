<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\About;
use App\Models\Term;
use App\Models\Privacy;
use App\Models\Contact;
use App\Models\Pageheadding;






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
     $privacy_page = Privacy::first();
     $contact_page = Contact::first();
     $pageheading = Pageheadding::first();
     view()->share('global_page',$about_data);
     view()->share('term_page',$term_data);
     view()->share('privacy_page',$privacy_page);
     view()->share('contact_page',$contact_page);
     view()->share('pageheading',$pageheading);

    }
}
