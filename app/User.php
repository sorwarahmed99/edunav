<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_admin','provider', 'provider_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    public function studentinfos()
    {
        return $this->hasMany('App\StudentInformation');
    }

    public function studentedus()
    {
        return $this->hasMany('App\StudentEducation');
    }

    public function studentindoc()
    {
        return $this->hasMany('App\StudentDocument');
    }

    public function post()
    {
        return $this->hasMany('App\ForumPost');
    }


    public function comment()
    {
        return $this->hasMany('App\ForumComment');
    }

    public function studentwork()
    {
        return $this->hasMany('App\WorkExperience');
    }
    
}
