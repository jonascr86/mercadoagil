<?php

namespace App\Providers;

use App\FieldType;
use App\ServiceType;
use App\EquipmentType;
use App\TipoDePool;
use App\Pool;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class ViewComposerProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
//        view()->composer('*', function($view) {
//            $equipmentTypes = EquipmentType::all();
//            $view->with('equipmentTypesMenu', $equipmentTypes);
//        });
//
//        view()->composer('*', function($view) {
//            $serviceTypes = ServiceType::all();
//            $view->with('serviceTypesMenu', $serviceTypes);
//        });
//
//        view()->composer('layouts/dynamic-fields/modal', function($view) {
//            $fieldsType = FieldType::all()->lists('name', 'id');
//            $view->with('fieldsType', $fieldsType);
//
//            $view->with('tiposPool', TipoDePool::obterLista());
//        });
//
//        view()->composer('layouts/components/form/pool', function($view) {
//            $idTipoPool = $view->offsetGet('idTipoPool');
//            $view->with('poolAleatorio', Pool::obterPoolAleatorio($idTipoPool));
//            $view->with('tiposDePool', Pool::obterPoolsDoTipo($idTipoPool));
//        });
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
