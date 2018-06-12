<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//打印sql语句
/*Event::listen('illuminate.query',function($query){
   var_dump($query);
});*/

Route::get('/', function () {
    return view('welcome');
});
//测试路由001
Route::get('/test', function () {
    echo "hello world";
});
Route::get('/controller','UserController@show');
//用户修改
Route::get('/user/edit/{id}/{user}','UserController@edit');
//测试数据库操作
Route::get('/db','UserController@db');
Route::resource('text','TextController');
Route::get('/room','RoomController@index');
Route::get('/each','EachController@index');
Route::get('/testSleep','EachController@testSleep');
Route::get('/test','testController@index');