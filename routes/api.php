<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController; 

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
$router->group(['prefix'=>'department'], function () use ($router){
    $router->get('list', 'DepartmentController@index');
    $router->get('{id}', 'DepartmentController@show');
    $router->post('create', 'DepartmentController@store');
    $router->put('/{id}', 'DepartmentController@update');
    $router->delete('/{id}', 'DepartmentController@destroy');

});

$router->group(['prefix'=>'jabatan'], function () use ($router){
    $router->get('list', 'JabatanController@index');
    $router->get('{id}', 'JabatanController@show');
    $router->post('create', 'JabatanController@store');
    $router->put('{id}', 'JabatanController@update');
    $router->delete('{id}', 'JabatanController@destroy');
});

$router->group(['prefix'=>'level'], function () use ($router){
    $router->get('list', 'LevelController@index');
    $router->get('{id}', 'LevelController@show');
    $router->post('create', 'LevelController@store');
    $router->put('{id}', 'LevelController@update');
    $router->delete('{id}', 'LevelController@destroy');
});

$router->group(['prefix'=>'karyawan'], function () use ($router){
    $router->get('list', 'KaryawanController@index');
    $router->get('{id}', 'KaryawanController@show');
    $router->post('create', 'KaryawanController@store');
    $router->put('{id}', 'KaryawanController@update');
    $router->delete('{id}', 'KaryawanController@destroy');
});
