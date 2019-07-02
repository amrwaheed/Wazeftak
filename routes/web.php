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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/master', function (){return view('layouts/master');})->name('master');


// Route of admins

Route::namespace('Admin')->group(function () {

    Route::prefix('admin')->group(function (){

        Route::resource('users'   ,'UserController');
        Route::resource('position'   , 'PositionController');

        Route::resource('religion'   , 'ReligionController');
        Route::resource('degree'     ,'DegreeController');
        Route::resource('grade'      ,'GradeController');
        Route::resource('language'   ,'LanguageController');
        Route::resource('languagelevel'   ,'LanguagelevelController');
        Route::resource('currency'   ,'CurrencyController');
        Route::resource('career'   ,'CareerlevelController');

        // Uses first & second Middleware

    });

});


Route::namespace('User')->group(function () {

    Route::prefix('users')->group(function (){

        Route::resource('personal'   ,'PersonalController');
        Route::resource('employement'   ,'EmployementController');
        Route::resource('experience'   ,'ExperienceController');
        Route::resource('education'   ,'EducationController');

        Route::resource('educations'   ,'UniversityController');
        Route::resource('course'   ,'CourseController');
        Route::resource('skills'   ,'SkillController');
        Route::resource('languages'   ,'LanguagelistController');
        Route::resource('onlinePersence'   ,'OnlinePersenceController');
        Route::resource('certification'   ,'CertifationController');
        Route::resource('profile'   ,'ProfileController');
        Route::resource('reset'   ,'ResetPasswordController');


       // Route::resource('education'   ,'UniversityController');




        // Uses first & second Middleware

    });
});


Route::namespace('company')->group(function () {

    Route::prefix('company')->group(function (){

        Route::resource('company'   ,'CompanyController');

        // Uses first & second Middleware

    });
});


