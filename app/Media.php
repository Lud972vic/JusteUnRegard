<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'medias';
    public $timestamps = true;

    protected $fillable = [
        'nom_media', 'lib_media', 'taille_media',
        'noto_media', 'url_media', 'desc_media',
        'type_fichier_media', 'dure_media', 'categorie_id',
        'user_id', 'bannir'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function categorie()
    {
        return $this->belongsTo('App\Categorie', 'categorie_id', 'id');
    }

    public function commentaire()
    {
        return $this->hasMany('App\Commentaire', 'media_id', 'id');
    }
}
