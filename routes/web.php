<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth ;
 use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

 Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){









    Route::get('/', function () {
        return view('welcome');
    });

    Auth::routes();

    Route::post('/home', 'frontController@store')->name('store');

    Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
    Route::get('{provider}/callback', 'Auth\LoginController@handleProviderCallback');
     Route::get('password/restore', 'frontController@resetpassword');


    Route::any('/logout','Auth\LoginController@logout');


    Route::prefix('dashboard')
        ->name('dashboard/')
        ->middleware('role:superadministrator')
        ->group(function (){


        Route::get('/setting', 'UsersController@setting')->name('setting') ;
        Route::post('/setting', 'UsersController@changeData')->name('changeData') ;


            // Users

        Route::get('/', 'UsersController@index')->name('index') ;
        Route::get('/users', 'UsersController@showAll')->name('users') ;
        Route::PUT('/{id}/update', 'UsersController@update')->name('update') ;
        Route::PUT('/{id}/unban', 'UsersController@unban')->name('unban') ;
        Route::POST('/users', 'UsersController@search')->name('searchUsers') ;

        //profs
        Route::get('/profs', 'UsersController@showAllProfs')->name('profs') ;
        Route::PUT('/{id}/attachAdmin', 'UsersController@mettreProf')->name('attachAdmin') ;
        Route::PUT('/{id}/DetachAdmin', 'UsersController@dettachProf')->name('dettachAdmin') ;
        Route::POST('/profs', 'UsersController@searchProfs')->name('searchProfs') ;


            // categories
        Route::get('/categories', 'CategoriesController@index')->name('categories') ;
        Route::PUT('Categorie/{id}/edit', 'CategoriesController@update')->name('catEdit') ;
        Route::POST('Categorie/create', 'CategoriesController@store')->name('catcreate') ;
        Route::PUT('Categorie/{id}/delete', 'CategoriesController@destroy')->name('catdelete') ;

        //courses
        Route::get('/course/create', 'CourseController@create')->name('createCourse') ;
        Route::POST('/course/create', 'CourseController@store')->name('SaveCourse') ;
        Route::get('/course/edit', 'CourseController@index')->name('editcourse') ;
        Route::POST('/course/search', 'CourseController@indexSearch')->name('searchCourse') ;
        Route::get('/course/{id}/edit', 'CourseController@edit')->name('Editspecific') ;
        Route::post('/course/{id}/update', 'CourseController@update')->name('updateCourse');
        Route::delete('/course/{id}/delete', 'CourseController@destroy')->name('deleteCourse');


        //Episode
            Route::get('/course/{id}/Episode', 'EpisodeController@index')->name('Episodes');
            Route::delete('/EP/{id}/delete', 'EpisodeController@destroy')->name('deleteEP');
            Route::post('/EP/{id}/create', 'EpisodeController@store')->name('createEP');
            Route::put('/EP/{id}/edit', 'EpisodeController@update')->name('editEP');


        //coupons
            Route::get('/coupons', 'CouponController@index')->name('Coupons');
            Route::PUT('coupons/{id}/update', 'CouponController@update')->name('couponEdit') ;
            Route::POST('coupons/create', 'CouponController@store')->name('couponCreate') ;
            Route::delete('/coupons/{id}/delete', 'CouponController@destroy')->name('deleteCoupons');


        });





    Route::prefix('prof')
        ->name('prof/')
        ->middleware('role:superadministrator|administrator')
        ->group(function (){
            //courses

            Route::get('/course/create', 'professorCourses@create')->name('createCourse') ;
            Route::POST('/course/create', 'professorCourses@store')->name('SaveCourse') ;
            Route::get('/course/edit', 'professorCourses@index')->name('editcourse') ;
            Route::POST('/course/search', 'professorCourses@indexSearch')->name('searchCourse') ;
            Route::get('/course/{id}/edit', 'professorCourses@edit')->name('Editspecific') ;
            Route::post('/course/{id}/update', 'professorCourses@update')->name('updateCourse');
            Route::delete('/course/{id}/delete', 'professorCourses@destroy')->name('deleteCourse');


            //Episode
            Route::get('/course/{id}/Episode', 'professorEpisodesController@index')->name('Episodes');
            Route::delete('/EP/{id}/delete', 'professorEpisodesController@destroy')->name('deleteEP');
            Route::post('/EP/{id}/create', 'professorEpisodesController@store')->name('createEP');
            Route::put('/EP/{id}/edit', 'professorEpisodesController@update')->name('editEP');




        });










    Route::get('/home', 'frontcontroller@index')->name('home');


    Route::get('/pricing', function (){
        return view('Front.pricing');})->name('pricing');

     Route::get('/privacy', function (){
         return view('Front.privacy');})->name('privacy');

     Route::get('/contact', function (){
         return view('Front.contact');})->name('contact');
    //courses
    Route::get('/course/{id}', 'frontcontroller@showCourse')->name('courses');

    // episodes
    Route::get('/episodes/{id}', 'frontcontroller@showEps')->name('front/episodes')->middleware('auth','role:user|superadministrator');
    Route::get('/episode/{id}', 'frontcontroller@showEp')->name('Episode')->middleware('auth','role:user|superadministrator');
    Route::post('/episode/{id}', 'frontcontroller@saveEpisode')->name('saveEpisode')->middleware('auth','role:abonne|superadministrator');

    // Comments
     Route::post('/Comment', 'CommentsController@store')->name('Commenter')->middleware('auth','role:abonne|superadministrator');
     Route::put('/CommentModify', 'CommentsController@update')->name('modifyComment')->middleware('auth','role:abonne|superadministrator');
     Route::delete('/CommenteDelete', 'CommentsController@destroy')->name('DeleteComment')->middleware('auth','role:abonne|superadministrator');




     //profile
    Route::get('/profile', 'frontcontroller@profile')->name('profile')->middleware('auth','role:abonne|superadministrator');
    Route::get('/cancelSubs', 'frontcontroller@cancelPayment')->name('cancelSubs')->middleware('auth','role:abonne|superadministrator');











});

Route::get('payment/{id}', 'PaymentController@payment')->name('checkout')->middleware('auth');
Route::post('payment/{id}', 'PaymentController@paymentCoupon')->name('checkoutCoupon')->middleware('auth');
Route::post('subscribe', 'PaymentController@subscribe')->middleware('auth');;


use App\Mail\welcome ;
use Illuminate\Support\Facades\Mail ;
use Spatie\Analytics\Period;



//
//Route::get('/data',function (){
//    $maxResults  = 5 ;
//
//    auth()->user()->detachRole('abonne');
//
////  TOP BROWSERS
//  $top_browser = Analytics::fetchTopBrowsers(Period::days(7));
//
////----------------------------------------------------------------------------------
//
//// Visited pages
//$Visited_pages = Analytics::fetchMostVisitedPages(Period::days(7),   $maxResults);
//
////----------------------------------------------------------------------------------
//
//
//// Users Type
//    $users_type = Analytics::fetchUserTypes(Period::days(7));
//
////----------------------------------------------------------------------------------
//
//
//// Top referernces
//
//    $top_ref = Analytics::fetchTopReferrers(Period::days(7));
//
//
//
//
//
//dd($Visited_pages,$top_browser,$users_type,$top_ref);
//
//
//
//
//
//});
