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

Route::get('/user', function(){
    return Request::all();
});
Route::any('test', 'UserController@index');  // 测试


Route::get('/sss', function (){
    echo 666;


    sleep(2);
    echo 777;


    echo 888;
    return 9999;
});