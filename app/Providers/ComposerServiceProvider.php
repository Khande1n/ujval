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
		
		View::composer('/principal/profilePage', 'App\Http\ViewComposers\ViewAuthUserComposer');
		
		View::composer('principal/create', 'App\Http\ViewComposers\CreateComposer');
		
		View::composer('*', 'App\Http\ViewComposers\AttendanceComposer');
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
