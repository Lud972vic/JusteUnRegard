<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Civilite extends Model 
{

    protected $table = 'civilites';
    public $timestamps = true;

    public function user()
    {
        return $this->hasMany('App\User', 'civilite_id');
    }

}