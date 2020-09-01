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

/* ------------------------------------------------------------ */

//* Main page
Route::get('/', 'PostController@main')->name('main');

/* ------------------------------------------------------------ */

//* Show posts
//Display all the posts
Route::get('/posts', 'PostController@index')->name('posts');
//Display 1 post
Route::get('/posts/{id}', 'PostController@show');

/* ------------------------------------------------------------ */

//* Create Post
/* When using the url posts/create it creates an issue with posts/{id}, since it think create should be an id.
To fix this i changed the url to post/create.
Another 'fix' would have also been to move the route for posts/create above the posts/id* - Luchi */
Route::get('/post/create', 'PostController@create')->name('post.create')->middleware('auth');
Route::post('/post/create', 'PostController@store');

/* ------------------------------------------------------------ */

//* UPDATE posts -jo
Route::get('/post/update/{editPostId}', 'PostController@edit')->middleware('auth');
Route::put('/post/update/{editPostId}', 'PostController@update');
// Redirects user if not logged in
Route::get('/post/update', function () {
    return redirect('/login');
})->middleware('auth');

/* ------------------------------------------------------------ */

//* LIKE posts jo
Route::get('/post/like/{likePostId}', 'PostController@likePost')->middleware('auth');
// Redirects user if not logged in
Route::get('/post/like', function () {
    return redirect('/login');
})->middleware('auth');

/* ------------------------------------------------------------ */

//* Reporting a post
Route::get('/post/report/{id}', 'PostController@report')->name('post.report')->middleware('auth');
Route::get('/post/reported', 'PostController@thirdReport')->middleware('auth');

/* ------------------------------------------------------------ */

//*Deleting a post as an admin or author if the post
//TODO User can do this without being admin
Route::get('/post/delete/{id}', 'PostController@destroy')->middleware('auth');

/* ------------------------------------------------------------ */

Route::get('/test', 'PostController@test'); //* jo keep

/* ------------------------------------------------------------ */

//* Commments
Route::post('/posts/comment/{id}', 'CommentController@store');
/* ------------------------------------------------------------ */

//* Laravel routes
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

/* ------------------------------------------------------------ */

//* Users admin Dashboard
Route::get('/admin/users', 'HomeController@showUser')->name('admin-users');
Route::post('admin/userRole/{id}', 'HomeController@edit');
Route::post('/admin/delete/{id}', 'HomeController@destroy')->middleware('auth');

/* ------------------------------------------------------------ */

//* Posts Admin dashboard
Route::get('/admin/posts', 'PostController@showSoftDeleted')->name('admin-posts')->middleware('auth');
// for faulty AJAX call
Route::get('/admin/posts/delete/{id}', 'PostController@destroyAdmin');
Route::put('/admin/posts/restore/{id}', 'PostController@restore');

/* ------------------------------------------------------------ */

//* Profile dashboard
Route::get('/profile', function () {
    return view('profile');
})->name('profile');
Route::get('/profile', 'HomeController@showProfile')->name('profile');
Route::put('/profile/update', 'HomeController@update');

/* ------------------------------------------------------------ */

//* Stats page
Route::get('statistics', function () {
    return view('statistics');
})->name('stats');

/* ------------------------------------------------------------ */

//* About us
Route::get('/about-us', function () {
    return view('about-us');
})->name('about-us');

/* ------------------------------------------------------------ */

//* Redirection
Route::get('admin/userRole/{id}', function () {
    return redirect('/');
});
/* Route::get('admin/delete/{id}', function () {
    return redirect('/');
}); */
/* Route::get('/admin/posts/delete/{id}', function () {
    return redirect('/');
}); */
Route::get('/admin/posts/restore/{id}', function () {
    return redirect('/');
});
Route::get('/profile/update', function () {
    return redirect('/');
});

/* ------------------------------------------------------------ */

//* New Password Email
Route::get('/sendmail', 'MailController@sendMail');
