<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blogeintrag extends Model
{
    public function autor(){
        return $this->belongsTo('App\User','user_id');
    }

    protected $fillable = ['titel', 'inhalt'];
}
