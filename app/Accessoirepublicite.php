<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accessoirepublicite extends Model 
{

    protected $table = 'accessoirepublicites';
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function typeannonce()
    {
        return $this->belongsTo('App\Typeannonce');
    }

}