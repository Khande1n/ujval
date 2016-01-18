<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use Auth;
use App\Grade;
use App\Exam;
use App\School;
use App\Role;
use App\Subject;
use App\Student;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
     	view()->share('nowTime', Carbon::now() -> toFormattedDateString());
		
		
		

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
