<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//this is the route file . we define some url and also define which controller and which method its will call
// 1st one for base url so its goes to HomeController and call index method. lets see the controller

Route::get('/','HomeController@index');
Route::get('home', 'HomeController@index');
// this is about page route
Route::get('about', 'PagesController@about');
Route::get('contact', 'PagesController@contact');

// here add a new route  which goes to page controller pricing method.
Route::get('pricing', 'PagesController@pricing');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

if (Request::is('admin/*'))
{
    require __DIR__.'/admin_routes.php';
}


// now check single place view. here we use a resource type routing.
// which is actually generate multiple route in a single
// ref: http://laravel.com/docs/5.0/routing

Route::resource('place', 'PlaceController');
