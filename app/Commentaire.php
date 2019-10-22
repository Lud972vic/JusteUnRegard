<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model 
{

    protected $table = 'commentaires';
    public $timestamps = true;

    public function media()
    {
        return $this->belongsTo('App\Media');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}