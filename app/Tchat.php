<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tchat extends Model
{
    protected $table = 'tchats';
    public $timestamps = true;

    /*Recuperer le pseudo liè à un post*/
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
