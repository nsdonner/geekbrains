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



Route::get('/var1', function () {
    return view('welcomeVar1');
});

Route::get('/var2', function () {
    return view('welcomeVar2');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




//Route::get('/{controller}/{method?}',function($controller,$method='index',array $arguments = []){
//    $app = app();
//    $arguments['request']= request();
//    $controller = $app->make('\App\Http\Controllers\\'.$controller.'Controller');
//    return $controller->callAction($method, $arguments);
//});
Route::group(['middleware'=>'auth'],function(){
   Route::match(['get','post'],'/id{id}/{method?}',['as' => 'profile', function($id,$method='index',array $arguments = []){
        $app = app();
        $arguments['request']= request();
        $arguments['id'] = $id;
        $controller = $app->make('\App\Http\Controllers\CabinetController');
        return $controller->callAction($method, $arguments);
   }]);
    Route::match(['get','post','delete'],'/project/{name?}/{method?}',['as' => 'project', function($name="",$method='index',array $arguments = []){
        $app = app();
        $arguments['request']= request();
        $arguments['name'] = $name;
        $controller = $app->make('\App\Http\Controllers\ProjectController');
        return $controller->callAction($method, $arguments);
    }]);
});