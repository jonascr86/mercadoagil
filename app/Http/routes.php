<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

# Login
Route::get('login', ['as' => 'admin-login', 'uses' => 'AuthController@getLogin']);
Route::post('login', 'AuthController@postLogin');
//Route::get('register', ['as' => 'admin-register', 'uses' => 'AuthController@getRegister']);
//Route::post('register', 'AuthController@postRegister');
Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@getLogout']);

# Forgot Password
Route::get('forgot-password', ['as' => 'forgot-password', 'uses' => 'AuthController@getForgotPassword']);
Route::post('forgot-password', ['as' => 'forgot-password', 'uses' => 'AuthController@postForgotPassword']);

# Forgot Password Confirmation
Route::get('forgot-password/{userId}/{passwordResetCode}', ['as' => 'forgot-password-confirm', 'uses' => 'AuthController@getForgotPasswordConfirm']);
Route::post('forgot-password/{userId}/{passwordResetCode}', 'AuthController@postForgotPasswordConfirm');

Route::get('/', ['as' => 'site.home', 'uses' => 'Site\HomeController@index']);
Route::get('itens', ['as' => 'site.itens', 'uses' => 'Site\HomeController@itens']);
Route::get('produtosimples', ['as' => 'site.produtosimples', 'uses' => 'Site\HomeController@produtoSimples']);

Route::get('/sendMail', 'EmailController@send');

Route::group(['middleware' => 'SentinelAdmin'], function () {

    # User Management
    # TODO: Apply RESTful
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', ['as' => 'users', 'uses' => 'UsersController@getIndex']);
        Route::get('create', ['as' => 'users.create', 'uses' => 'UsersController@getCreate']);
        Route::post('create', ['as' => 'users.create', 'uses' => 'UsersController@postCreate']);
        Route::get('{userId}/edit', ['as' => 'users.edit', 'uses' => 'UsersController@getEdit']);
        Route::post('{userId}/edit', 'UsersController@postEdit');
        Route::get('{userId}/delete', ['as' => 'delete/user', 'uses' => 'UsersController@getDelete']);
        Route::get('{userId}/confirm-delete', ['as' => 'confirm-delete/user', 'uses' => 'UsersController@getModalDelete']);
        Route::get('{userId}/restore', ['as' => 'restore/user', 'uses' => 'UsersController@getRestore']);
        Route::get('{userId}', ['as' => 'users.show', 'uses' => 'UsersController@show']);
    });

    # User groups
    Route::resource('user/group', 'GroupsController');

    # Equipments Type
    Route::resource('equipment/type', 'EquipmentTypeController');
    Route::post('equipment/type/dynamic-field', ['as' => 'equipment.type.dynamic-field', 'uses' => 'EquipmentTypeController@storeDynamicField']);

    # Equipments Group
    Route::resource('equipment/group', 'EquipmentGroupController');

    # Equipments
    Route::get('equipment/{id}/create', ['as' => 'equipment.create', 'uses' => 'EquipmentController@create']);
    Route::get('equipment', ['as' => 'equipment.index', 'uses' => 'EquipmentController@index']);
    Route::post('equipment/{id}', ['as' => 'equipment.store', 'uses' => 'EquipmentController@store']);
    Route::get('equipment/{id}', ['as' => 'equipment.show', 'uses' => 'EquipmentController@show']);

    # Pool
    Route::resource('pool/tipo', 'TipoDePoolController');
    Route::resource('pool', 'PoolController');

    # Service Types
    Route::resource('service/type', 'ServiceTypeController');
    Route::post('service/type/dynamic-field', ['as' => 'service.type.dynamic-field', 'uses' => 'ServiceTypeController@storeDynamicField']);

    # Services
    Route::get('service/{id}/create', ['as' => 'service.create', 'uses' => 'ServiceController@create']);
    Route::get('service', ['as' => 'service.index', 'uses' => 'ServiceController@index']);
    Route::post('service/{id}', ['as' => 'service.store', 'uses' => 'ServiceController@store']);
    Route::get('service/{id}', ['as' => 'service.show', 'uses' => 'ServiceController@show']);

    # POP
    Route::resource('pop', 'PopController');
    Route::get('listar-equipamentos/{tipo}', ['as' => 'listar.equipamentos', 'uses' => 'PopController@listarEquipamentos']);

    # ACESSOS
    //Route::resource('acesso', 'AcessoController');
    
    # CADASTRO CLIENTES
    Route::resource('cadastro/cliente', 'ClienteController');
    
    # Chandra Theme Views
    Route::get('chandra/{name?}', 'ChandraController@showView');
});

Route::group(['middleware' => 'SentinelUser'], function () {
    Route::group(['prefix' => 'usuario'], function () {
        // isso vai mudar no futuro
        // vamos ter que decidir como vamos exibir os menus de acordo com os usuarios
        // como mesclar as rotas
        // o ideal eh que tenha uma estrutura bem definida para isso (nao ter que mudar rotas e nos templates, repetindo codigo)
        Route::get('/', ['as' => 'dashboard', 'uses' => 'ChandraController@showHome']);
        //Route::get('/', function(){
        //  'precisa ser implementado';
        //});
    });
});



//mercado Resources
/********************* mercado ***********************************************/
Route::resource('mercado','\App\Http\Controllers\MercadoController');
Route::post('mercado/{id}/update','\App\Http\Controllers\MercadoController@update');
Route::get('mercado/{id}/delete','\App\Http\Controllers\MercadoController@destroy');
Route::get('mercado/{id}/deleteMsg','\App\Http\Controllers\MercadoController@DeleteMsg');
/********************* mercado ***********************************************/


//pedido Resources
/********************* pedido ***********************************************/
Route::resource('pedido','\App\Http\Controllers\PedidoController');
Route::post('pedido/{id}/update','\App\Http\Controllers\PedidoController@update');
Route::get('pedido/{id}/delete','\App\Http\Controllers\PedidoController@destroy');
Route::get('pedido/{id}/deleteMsg','\App\Http\Controllers\PedidoController@DeleteMsg');
/********************* pedido ***********************************************/

