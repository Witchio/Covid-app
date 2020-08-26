<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // ONE User has MANY Comments (inverse)
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
