<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Report;
use App\Subreport;
use App\MovieReport;
use App\EpisodeReport;

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
        //
        view()->composer('admin.frame', function($view){
            $r1 = Report::get();
            $r2 = Subreport::get();
            $r3 = MovieReport::get();
            $r4 = EpisodeReport::get();
            if(count($r1)>0 || count($r2)>0){
                $msg1 = 1;
            }else{
                $msg1 = 0;
            }
            if(count($r3)>0 || count($r4)>0){
                $msg2 = 2;
            }else{
                $msg2 = 0;
            }
            $notifications = $msg1+$msg2;

            $view->with('notifications',$notifications);
        });
    }
}
