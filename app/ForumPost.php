<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class ForumPost extends Model
{
    public function path()
    {
        return url("/post/{$this->id}-". Str::slug($this->title));
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
