<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Typeannonce extends Model 
{

    protected $table = 'typeannonces';
    public $timestamps = true;

    public function accessoirepublicite()
    {
        return $this->hasMany('App\Accessoirepublicite', 'typeannonce_id');
    }

}