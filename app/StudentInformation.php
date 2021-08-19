<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentInformation extends Model
{
    protected $fillable = ['user_id','degree','institution','passing_year'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
