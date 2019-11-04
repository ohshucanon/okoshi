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

Route::get('/', 'TopicsController@index');
Route::get('what_is_okoshi', function () {
    return view('what_is_okoshi');
});

//ユーザー登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

//ログイン認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

//その他機能
Route::group(['middleware' => ['auth']], function () {
    
    Route::resource('users', 'UsersController', ['only' => ['index', 'update', 'show', 'edit']]);
    Route::group(['prefix' => 'users/{id}'], function () {
        Route::get('usersdetails', 'UsersController@usersdetails')->name('users.usersdetails');
        Route::get('usersdetails/delete', 'UsersController@delete')->name('users.delete');
        Route::get('favorites', 'UsersController@favorites')->name('users.favorites');
    });
    
    Route::resource('topics', 'TopicsController', ['only' => ['create', 'store', 'edit', 'update','destroy']]);
    
    Route::group(['prefix' => 'topics/{id}'], function () {
        Route::resource('comments', 'CommentsController', ['only' => ['store', 'destroy']]);
        Route::post('favorite', 'FavoritesController@store')->name('favorites.favorite');
        Route::delete('unfavorite', 'FavoritesController@destroy')->name('favorites.unfavorite');
    });
});


Route::group(['prefix' => 'topics/{id}'], function () {
        Route::get('topicsdetails', 'TopicsController@topicsdetails')->name('topics.topicsdetails');
});

