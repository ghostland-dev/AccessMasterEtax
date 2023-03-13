<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use App\Models\Alerte;
use Illuminate\Support\ServiceProvider;
 
class ViewComposerServiceProvider extends ServiceProvider
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
 
       View::composer('*', function ($view) {
        $modelData = Alerte::all();
        $view->with('modelData', $modelData);
        });

    }
}
