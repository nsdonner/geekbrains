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
Route::get('/{controller}/{method?}',function($controller,$method='index',array $arguments = []){
    $app = app();
    $arguments['request']= request();
    $controller = $app->make('\App\Http\Controllers\\'.$controller.'Controller');
    return $controller->callAction($method, $arguments);
});