<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('is_valid_email', function($attribute, $value, $parameters, $validator) {

            if(preg_match("/^[^@]*@[^@]*\.[^@]*$/", $value)){

                return true;

            }

                return false;

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
