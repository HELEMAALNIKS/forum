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
    $threads=App\Thread::paginate(15);
    return view('welcome',compact('threads'));
//    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/thread','ThreadController');

Route::resource('comment', 'CommentController',['only'=>['update','destroy']]);

Route::post('comment/create/{thread}','ThreadController@storeComment')->name('threadcomment.store');
