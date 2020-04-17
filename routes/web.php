<?php

use Illuminate\Support\Facades\Route;

// テスト、ローカルではhttp通信 本番環境ではhttps通信にする
if(config('app.env') === 'production'){
    // asset()やurl()がhttpsで生成される
    redirect()->secure('https');
}

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

Route::get('/{any?}', function(){
    return view('quiz');
})->where('any', '.+');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
