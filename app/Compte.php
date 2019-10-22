<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compte extends Model 
{

    protected $table = 'comptes';
    public $timestamps = true;

    public function user()
    {
        return $this->hasMany('App\User', 'compte_id');
    }

}