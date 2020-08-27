<?php
// php artisan make:model Post
// https://laravel.com/docs/7.x/eloquent#defining-models

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    // SOFT DELETES for admin records
    use SoftDeletes;

    // define RELATIONSHIP manytomany -> USERs (jo)
    // second argument in belongsToMany() is the name of the intermediary table
    public function users()
    {
        return $this->belongsToMany('App\User', 'likes');
    }
    public function postUser()
    {
        return $this->belongsTo('App\User');
    }
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    public function usersReports()
    {
        return $this->belongsToMany('App\User', 'reports', 'post_id', 'user_id')->withTimestamps();
    }
    /* public function commentator()
    {
        return $this->hasManyThrough('App\User', 'App\Comment');
    } */
}
