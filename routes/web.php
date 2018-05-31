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

Route::get('/help', 'HelpController@show');
Route::get('/help/show', 'HelpController@show');
Route::get('/help/controller/{id}', 'HelpController@controller');
Route::get('/help/htmlToJpg', 'HelpController@htmlToJpg');
Route::get('/help/htmlToJpgByPantomjs', 'HelpController@htmlToJpgByPantomjs');
Route::get('/help/toEgg', 'HelpController@toEgg');
Route::get('/photos/list', 'PhotoController@list');
Route::resource('photos', 'PhotoController', ['names' => [
    'create' => 'photos.build'
]]);



Route::get('/blade', function () {
    return view('layouts/child');
});

Route::middleware(['check.age'])->group(function() {
    // /foo/12/20
    Route::get('help/{name}/{age}/{id?}', function ($name, $age, $id = 22) {
        $url = route('nameTest', ['name' => 'coco', 'age' => 88]);
        return 'Hello World'.
            '<br />路由参数name:'.$name.
            '<br />路由可选参数id:'.$id.
            '<br />路由命名:'.$url.
            '<br />中间件age:'.$age.
            '<br />';
    })->where('name', '[A-Za-z]+')->name('nameTest');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
