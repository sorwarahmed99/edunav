<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
