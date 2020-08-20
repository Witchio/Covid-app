<?php
// php artisan make:model Post
// https://laravel.com/docs/7.x/eloquent#defining-models

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    //
    use SoftDeletes;
}
