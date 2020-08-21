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
}
