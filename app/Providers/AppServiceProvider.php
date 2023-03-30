<?php

namespace App\Providers;


use App\Models\Language;
use App\Models\News;
use App\Models\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength('250');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {


        if(Schema::hasTable('settings')){
            view()->share('settings',Setting::first());
        }
        if(Schema::hasTable('news')){
            view()->share('news',News::take(3)->inrandomorder()->get());
        }


    }
}
