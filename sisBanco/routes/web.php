<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::group(['middleware' => ['auth']], function() {

    Route::get('/home', 'HomeController@index');

    Route::resource('users','UserController');
    Route::get('roles',['as'=>'roles.index','uses'=>'RoleController@index']);
    Route::get('roles/create',['as'=>'roles.create','uses'=>'RoleController@create']);
    Route::post('roles/create',['as'=>'roles.store','uses'=>'RoleController@store']);
    Route::get('roles/{id}',['as'=>'roles.show','uses'=>'RoleController@show']);

    Route::get('roles/{id}/edit',['as'=>'roles.edit','uses'=>'RoleController@edit']);
    Route::patch('roles/{id}',['as'=>'roles.update','uses'=>'RoleController@update']);

    Route::delete('roles/{id}',['as'=>'roles.destroy','uses'=>'RoleController@destroy']);

});
Route::get('persona/{id}/create/cuenta/ahorro', 'CuentaController@createahorro')->name('cuentaahorro');
Route::post('persona/{id}/create/cuenta/ahorro', 'CuentaController@store')->name('cuentaahorro.store');

Route::get('persona/{id}/create/cuenta/corriente', 'CuentaController@createcorriente')->name('cuentacorriente');
Route::post('persona/{id}/create/cuenta/corriente', 'CuentaController@store')->name('cuentacorriente.store');

Route::get('persona/{id}/create/cuenta/deposito', 'CuentaController@createdepositofijo')->name('cuentadeposito');
Route::post('persona/{id}/create/cuenta/deposito', 'CuentaController@store')->name('cuentadeposito.store');
Route::resource('personas','PersonaController');
Route::resource('listas','ListaNegraController');

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('t_credito','t_creditoController');
Route::resource('cuentas','CuentaController');
Route::resource('d_credito','d_creditoController');
//Route::resource('garante','garanteController');
Route::post('garante',['as'=>'garante.store','uses'=>'garanteController@store']);
Route::get('garante/create{id?}',['as' => 'garante.create','uses' => 'garanteController@create']);
 Route::get('perfil',['as'=>'users.perfil','uses'=>'UserController@indexPerfil']);

Route::get('perfil/edit',['as'=>'users.editperfil','uses'=>'UserController@editPerfil']);
Route::patch('perfil/edit',['as'=>'users.updatePerfil','uses'=>'UserController@updatePerfil']);

Route::patch('perfil',['as'=>'users.updateFondo','uses'=>'UserController@updateFondo']);