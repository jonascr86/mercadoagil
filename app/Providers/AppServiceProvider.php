<?php

namespace App\Providers;

use Validator;
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
        // TODO @nicolasluishuber: Validar campos dinâmicos, conforme suas especificações
        Validator::extend('dynamic_fields_exists', function($attribute, $value, $parameters, $validator) {
            \Log::info('dynamic fields value', [$value]);
            // foreach ($value as $fieldId => $fieldValue) {
            //     \Validator::make()
            // }
            return true;
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
