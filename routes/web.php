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

Route::get('/', 'PostController@main');

//* Posts routes
//Display all the posts
Route::get('/posts', 'PostController@index')->name('posts');
//Display 1 post
Route::get('/posts/{id}', 'PostController@show');


/* When using the url posts/create it creates an issue with posts/{id}, since it think create should be an id.
To fix this i changed the url to post/create.
Another 'fix' would have also been to move the route for posts/create above the posts/id* - Luchi */
//Create/store posts
Route::get('/post/create', 'PostController@create')->name('post.create');
Route::post('/post/create', 'PostController@store');

// Reporting a post
Route::get('/post/report/{id}', 'PostController@report')->name('post.report');


Route::get('/test', 'PostController@test'); // jo keep

//* Commments
//Route to add comment
Route::post('/posts/edit/{id}', 'CommentController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/posts/{id}', 'PostController@show');

// UPDATE posts jo
Route::get('/post/update/{editPostId}', 'PostController@edit');
Route::put('/post/update/{editPostId}', 'PostController@update');
//roller@show');

//* Routes for Admin Dashboard
Route::get('/admin/users', 'HomeController@showUser');
Route::post('admin/userRole/{id}', 'HomeController@edit');
Route::post('/admin/delete/{id}', 'HomeController@destroy');
//Show soft deleted posts
Route::get('/admin/posts', 'PostController@showSoftDeleted');
Route::post('/admin/posts/delete/{id}', 'PostController@destroy');
