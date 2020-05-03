<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;

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
        Schema::defaultStringLength(191);
        Blade::if('admin',function(){
            if(Auth::user()){
                if(Auth::user()->role=='admin'){
                    return true;
                }else{
                    return false;
                }
            }
            else{
                return false;
            }
        });
        Blade::if('client',function(){
            if(Auth::user()){
                if(Auth::user()->role=='client'){
                    return true;
                }else{
                    return false;
                }
            }
            else{
                return false;
            }
        });
    }
}
