<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Don extends Model 
{

    protected $table = 'dons';
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}