<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Countrie extends Model 
{

    protected $table = 'countries';
    public $timestamps = true;

    public function ville()
    {
        return $this->hasMany('App\Ville', 'countrie_id');
    }

}