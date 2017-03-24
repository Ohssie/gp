<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        if(!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' && $_SERVER['SERVER_PORT'] == 443) {
           \URL::forceSchema('https');
       }
        \View::composer('primary', function($view)
        {
            $clean = "DELETE FROM package_subscription WHERE status = 'incomplete' AND username NOT IN(SELECT username FROM users WHERE role = 'admin') AND created_at <";
            $clean .= " CASE ";
            $clean .= " WHEN DAYOFWEEK(created_at) = 6 THEN DATE_SUB(NOW(), INTERVAL ";
            $clean .= (int) config('settings.delete_records_after') + 3;
            $clean .= " DAY) ";
            $clean .= " WHEN DAYOFWEEK(created_at) = 7 THEN DATE_SUB(NOW(), INTERVAL ";
            $clean .= (int) config('settings.delete_records_after') + 2;
            $clean .= " DAY)";
            $clean .= "WHEN DAYOFWEEK(created_at) = 1 THEN DATE_SUB(NOW(), INTERVAL ";
            $clean .= (int) config('settings.delete_records_after') + 1;
            $clean .= " DAY)";
            $clean .= " ELSE DATE_SUB(NOW(), INTERVAL ";
            $clean .= (int) config('settings.delete_records_after');
            $clean .= " DAY) END";
            $clean = \DB::delete($clean);
        });
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
