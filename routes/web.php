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

Route::middleware(['check.age'])->group(function() {
    Route::get('foo/{id?}/{age?}', function ($id = 'default', $age = 20) {
        $url = route('nameTest', ['id' => 1]);
        return 'Hello World'.
            '<br />路由参数id:'.$id.
            '<br />路由命名:'.$url.
            '<br />中间件age:'.$age.
            '<br />';
    })->where('name', '[A-Za-z]+')->name('nameTest');
});