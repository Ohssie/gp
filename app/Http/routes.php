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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function ()
{
    return view('users.login');
});

Route::post('/login', 'Front@login');

Route::get('/signup', function ()
{
    return view('users.signup');
});

Route::post('/signup', 'Front@signup');

Route::get('/forgot-password', function ()
{
    return view('users.forgotpass');
});


Route::get('/logout', 'Front@logout');


Route::get('/admin/login', 'Admin@login');
