<?php
// use Illuminate\Routing\Route;

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

Route::group(['prefix' => LaravelLocalization::setLocale()] , function(){
    
    Route::get('/' , function () {
        return view('welcome');
    });

    Route::get('/about', function () {
        return view('about' );
    });

    Route::get('/mobile', function () {
        return view('mobile');
    });
    Route::get('/web', function () {
        return view('web_development');
    });
    Route::get('/digital', function () {
        return view('digital');
    });
    
    Route::resource('/contact-us', 'ToucheController');

    Route::resource('/hire', 'JoinController');

});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Admin')->group(function () {
    Route::resource('dashborad', 'AdminController');
    Route::resource('join', 'JoinController');
    Route::resource('ajaxcrud', 'AjaxCrudController');

});

Route::get('users', [ 'as'=>'data' ,'uses'=>'Admin\UserController@index']);
Route::get('users/getdata', [ 'as'=>'data.getdata' ,'uses'=>'Admin\UserController@getdata']);
Route::delete('users/{id}', [ 'as'=>'data.delete' ,'uses'=>'Admin\UserController@delete']);