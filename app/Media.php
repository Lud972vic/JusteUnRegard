<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{

    protected $table = 'medias';
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    public function categorie()
    {
        return $this->belongsTo('App\Categorie','categorie_id','id');
    }

    public function commentaire()
    {
        return $this->hasMany('App\Commentaire', 'media_id','id');
    }

}
