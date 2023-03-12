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

/**
 * Include routes for dashboard
 */
function dashBoardRoutes(){
    require_once('dashboard.php');
}

/**
 * Include routes for front
 */
function frontRoutes(){
    require_once('front.php');
}

frontRoutes();
dashBoardRoutes();

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
