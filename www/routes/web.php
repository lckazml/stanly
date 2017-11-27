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


Route::get('/', 'ArticlesController@lists');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/login','LoginController@login');
Route::post('/login','LoginController@dologin');
Route::get('/logout', 'LoginController@logout');
Route::get('/article/{id}.html', [
    'uses'=>'ArticlesController@show',
    'as'=>'detail'
]);
Route::get('/articles', 'ArticlesController@lists');



Route::group(['middleware'=>'login'],function(){
//后台路由规则
Route::get('/admin','AdminController@index');
//用户管理
Route::get('user/add','UserController@add');
Route::get('user/index','UserController@index');
Route::post('user/insert','UserController@insert');
Route::get('user/edit/{id}','UserController@edit');
Route::post('user/update','UserController@update');
Route::get('/user/delete/{id}','UserController@delete');
Route::get('/user/list','UserController@list');
//resful控制器
Route::resource('cate','CatesController');
Route::resource('tag','TagsController');
Route::resource('article','ArticlesController');

});

//Auth::routes();

