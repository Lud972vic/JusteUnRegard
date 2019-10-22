<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model 
{

    protected $table = 'profils';
    public $timestamps = true;

    public function user()
    {
        return $this->hasMany('App\User', 'profil_id');
    }

}