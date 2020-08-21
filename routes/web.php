<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

//* home route (landing page)

Route::get('/', 'PostController@main');

//* post routes
Route::get('/posts', 'PostController@index');
Route::get('/posts/{id}', 'PostController@show');
/* When using the url posts/create it creates an issue with posts/{id}, since it think create should be an id.
To fix this i changed the url to post/create.
Another 'fix' would have also been to move the route for posts/create above the posts/id* - Luchi */
Route::get('/post/create', 'PostController@create')->name('post.create');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
