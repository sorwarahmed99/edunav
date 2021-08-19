<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumComment extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
