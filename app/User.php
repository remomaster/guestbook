<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'nachname', 'email', 'password', 'geburtstag', 'geschlecht'
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
        'geburtstag' => 'datetime',
    ];

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function blogeintraege(){
        return $this->hasMany('App\Blogeintrag');
    }

    public function getIsAdminAttribute (){
        return $this->role->title === "Admin";
    }
}
