<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // ONE User has MANY Comments (inverse)
    public function userC()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    // ONE Post has MANY Comments (inverse)
    public function postC()
    {
        return $this->belongsTo('App\Post', 'post_id', 'id');
    }
}
