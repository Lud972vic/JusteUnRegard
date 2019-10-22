<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    protected $table = 'users';
    public $timestamps = true;

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
//'name', 'email', 'password',
        'name', 'prenom_adh', 'pseudo_adh', 'email', 'password', 'civilite_id', 'profil_id', 'ville_id', 'photo_adh'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function civilite()
    {
        return $this->belongsTo('App\Civilite');
    }

    public function profil()
    {
        return $this->belongsTo('App\Profil');
    }

    public function accessoirepublicite()
    {
        return $this->hasMany('App\Accessoirepublicite', 'user_id');
    }

    public function compte()
    {
        return $this->belongsTo('App\Compte');
    }

    public function don()
    {
        return $this->hasMany('App\Don', 'user_id');
    }

    public function ville()
    {
        return $this->belongsTo('App\Ville');
    }

    public function tchat()
    {
        return $this->hasMany('App\Tchat', 'user_id');
    }

    public function media()
    {
        return $this->hasMany('App\Media', 'user_id');
    }

    public function commentaire()
    {
        return $this->hasMany('App\Commentaire', 'user_id');
    }

}
