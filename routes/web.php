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
    Route::post('/contact-me','Frontend\MainController@contact_me')->name('contact.us');

    Route::post('photos/upload','Backend\PhotoController@upload')->name('photos.upload');
    Route::post('/comments/store','Frontend\CommentController@store')->name('comments.store');
    Route::post('/likes/store','Frontend\LikeController@store')->name('likes.store');
    Route::delete('/likes/destroy/{id}','Frontend\LikeController@destroy')->name('likes.destroy');
    Route::get('/likes','Frontend\LikeController@index')->name('likes.index');

    Route::get('/advertisements','Frontend\AdvertisementController@index')->name('advertisement.index');
    Route::get('/advertisements/create','Frontend\AdvertisementController@create')->name('advertisement.create');
    Route::get('/advertisements/edit/{id}','Frontend\AdvertisementController@edit')->name('advertisement.edit');
    Route::post('/advertisements/store','Frontend\AdvertisementController@store')->name('advertisement.store');
    Route::delete('/advertisements/destroy/{id}','Frontend\AdvertisementController@destroy')->name('advertisement.destroy');
    Route::patch('/advertisements/update/{id}','Frontend\AdvertisementController@update')->name('advertisement.update');

    Route::get('/achievements','Frontend\AchievementController@index')->name('achievements.index');
    Route::get('/achievements/create','Frontend\AchievementController@create')->name('achievements.create');
    Route::post('/achievements/store','Frontend\AchievementController@store')->name('achievements.store');
    Route::delete('/achievements/destroy/{id}','Frontend\AchievementController@destroy')->name('achievements.destroy');
    Route::post('/email/save','Frontend\UserController@emailSave')->name('email.save');
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
    Route::resource('/coupons','CouponController');

    Route::get('/contacts','ContactController@index')->name('contacts.index');
    Route::get('/contacts/{id}','ContactController@show')->name('contacts.show');
    Route::delete('/contacts/destroy/{id}','ContactController@destroy')->name('contacts.destroy');

    Route::get('/advertisements/true-status','AdvertisementController@trueStatus')->name('advertisements.trueStatus');
    Route::get('/advertisements/false-status','AdvertisementController@falseStatus')->name('advertisements.falseStatus');
    Route::get('/advertisements','AdvertisementController@falseStatus')->name('advertisements.falseStatus');
    Route::patch('/advertisements/update/{id}','AdvertisementController@update')->name('advertisements.update');
    Route::delete('/advertisements/destroy/{id}','AdvertisementController@destroy')->name('advertisements.destroy');

    Route::get('/achievements/true-status','AchievementController@trueStatus')->name('achievements.trueStatus');
    Route::get('/achievements/false-status','AchievementController@falseStatus')->name('achievements.falseStatus');
    Route::get('/achievements','AchievementController@falseStatus')->name('achievements.falseStatus');
    Route::patch('/achievements/update/{id}','AchievementController@update')->name('achievements.update');
    Route::delete('/achievements/destroy/{id}','AchievementController@destroy')->name('achievements.destroy');
    Route::resource('/episodes','EpisodeController');
    Route::get('/profile','UserController@profile')->name('profile.index');
    Route::get('/settings','SettingController@show')->name('settings.show');
    Route::patch('/settings/update/{id}','SettingController@update')->name('settings.update');
    Route::get('/settings/edit/{id}','SettingController@edit')->name('settings.edit');
    Route::post('/photo/store','PhotoController@store')->name('photo.store');
    Route::get('/comments/true-status','CommentController@trueStatus')->name('comments.trueStatus');
    Route::get('/comments/false-status','CommentController@falseStatus')->name('comments.falseStatus');
    Route::patch('/comments/update/{id}','CommentController@update')->name('comments.update');
    Route::delete('/comments/destroy/{id}','CommentController@destroy')->name('comments.destroy');
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
Route::get('/about','Frontend\MainController@about')->name('about');
Route::get('/coupon-show/{id}','Frontend\MainController@coupon_show')->name('coupon.show');
Route::get('/adv','Frontend\MainController@adv')->name('adv');
Route::get('/faq','Frontend\MainController@faq')->name('faq');
Route::get('/law','Frontend\MainController@law')->name('law');
Route::get('/contact-us','Frontend\MainController@contact_us')->name('contact_us');
Route::get('/articles/{slug}','Frontend\ArticleController@show')->name('articles.slug');
Route::get('/courses/{slug}','Frontend\CourseController@show')->name('articles.slug');
Route::get('/articles','Frontend\ArticleController@index')->name('articles');
Route::get('/courses','Frontend\CourseController@index')->name('articles');
Route::get('/gazettes','Frontend\GazetteController@index')->name('gazettes');
Route::get('/gazettes/{slug}','Frontend\GazetteController@show')->name('gazettes.slug');
Route::get('/podcasts','Frontend\PodcastController@index')->name('podcast');
Route::get('/podcasts/{slug}','Frontend\PodcastController@show')->name('podcasts.slug');
Route::get('/home','Frontend\MainController@index')->name('index');
Route::get('/index','Frontend\MainController@index')->name('welcome');
Route::get('/welcome','Frontend\MainController@index')->name('welcome');
Route::get('/advertisements/{id}','Frontend\AdvertisementController@show')->name('advertisement.show');
Route::get('/achievements/{id}','Frontend\AchievementController@show')->name('achievements.show');

Route::any('(:any)/(:all?)','Frontend\MainController@index');

