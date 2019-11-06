<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model 
{

    protected $table = 'categories';
    public $timestamps = true;

    public function media()
    {
        return $this->hasMany('App\Media', 'categorie_id');
    }

}
