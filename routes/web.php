<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::post('user/active','Frontend\UserController@activation')->name('activation.account');
Route::get('user/active/mobile','Frontend\UserController@verify')->name('verify.account');

Route::middleware('auth')->group(function(){
    Route::post('photos/upload','Backend\PhotoController@upload')->name('photos.upload');
});
Route::namespace('Backend')->prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
    Route::get('/','MainController@index')->name('panel');
    Route::get('/panel','MainController@index')->name('panel');
    Route::resource('/categories','CategoryController');
    Route::resource('/articles','ArticleController');
    Route::resource('/courses','CourseController');
    Route::resource('/gazettes','GazetteController');
    Route::resource('/podcasts','PodcastController');
    Route::resource('/parts','PartController');
    Route::resource('/episodes','EpisodeController');
    Route::get('/profile','UserController@profile')->name('profile.index');
    Route::get('/profile/edit','UserController@profileEdit')->name('profile.edit');
    Route::patch('/profile/update','UserController@profileUpdate')->name('update.profile');
    Route::resource('/users','UserController');
});

Route::group(['namespace' => 'Auth'] , function (){
    // Authentication Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::get('logout', 'LoginController@logout')->name('logout');
    Route::get('/profile', 'UserController@profile')->name('user.profile');
    Route::get('/profile/edit', 'UserController@profileEdit')->name('profile.edit');
    Route::patch('/profile/update', 'UserController@profileUpdate')->name('profile.update');

    // Registration Routes...
    Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'RegisterController@register');

    // Password Reset Routes...
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset');
});

Route::get('/','Frontend\MainController@index')->name('index');
Route::get('/home','Frontend\MainController@index')->name('index');
Route::get('/index','Frontend\MainController@index')->name('welcome');
Route::get('/welcome','Frontend\MainController@index')->name('welcome');
Route::any('(:any)/(:all?)','Frontend\MainController@index');

