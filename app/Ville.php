<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ville extends Model 
{

    protected $table = 'villes';
    public $timestamps = true;

    public function user()
    {
        return $this->hasMany('App\User', 'ville_id');
    }

    public function countrie()
    {
        return $this->belongsTo('App\Countrie');
    }

}