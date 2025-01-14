<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\View\Composers\PathToAssetsAdmin;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        View::composer('admin/*', PathToAssetsAdmin::class);
        /**
         * 1. шарить данные
         * //$path_to_img = asset('assets/admin/img/');
         * //View::share('path_to_img', asset('assets/admin/img/'));
         * 2. шарить данные через view composer
         * 3. 
         */
    }
}
