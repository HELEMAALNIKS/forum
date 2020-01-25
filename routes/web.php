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

//routes configureren

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/thread','ThreadController');

Route::resource('comment','CommentController',['only'=>['update','destroy']]);

Route::post('comment/create/{thread}','CommentController@addThreadComment')->name('threadcomment.store');

//Route::get('/user/profile/{user}','UserProfileController@index')->name('user_profile');

Route::get('/admin', 'AdminController@admin')
    ->middleware('is_admin')
    ->name('admin');

//gebruiker bewerken
Route::get('users/{user}',  ['as' => 'users.edit', 'uses' => 'UserController@edit']);

Route::patch('users/{user}/update',  ['as' => 'users.update', 'uses' => 'UserController@update']);



//Auth::routes();
//Route::get('/home', 'HomeController@index')
//    ->name('home');


