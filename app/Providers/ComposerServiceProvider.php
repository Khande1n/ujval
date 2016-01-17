<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Auth;
use View;


class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', 'App\Http\ViewComposers\GlobalComposer');
		
		View::composer('*', 'App\Http\ViewComposers\StudentViewComposer');
		
		View::composer('principal/create', 'App\Http\ViewComposers\CreateComposer');

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
