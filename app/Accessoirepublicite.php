<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accessoirepublicite extends Model
{

    protected $fillable = [
        'lib_acc_pub', 'desc_acc_pub', 'dt_debut_acc_pub',
        'dt_fin_acc_pub', 'statut_visibilite_acc_pub', 'url_img_1_acc_pub',
        'typeannonce_id', 'user_id', 'prix',
        'is_sold'
    ];

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
