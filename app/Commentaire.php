<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    protected $table = 'commentaires';
    public $timestamps = true;
    /*Les colonnes autorisées à être modifidier*/
    protected $fillable = ['user_id', 'media_id', 'lib_comm'];

    public function media()
    {
        return $this->belongsTo('App\Media');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
