<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdherentController extends Controller
{
    public function ousetrouventnosadherents()
    {
        $listeUsers = DB::table('users')
            ->join('villes', 'users.ville_id', '=', 'villes.id')
            ->join('profils', 'users.profil_id', '=', 'profils.id')
            ->select('users.pseudo_adh', 'villes.nom_ville_geo', 'profils.profil', 'villes.latitude_ville_geo', 'villes.longitude_ville_geo')
            ->get();

        $markers = array();
        foreach ($listeUsers as $item) {
            $markers[] = [
                'name' => $item->pseudo_adh,
                'city' => $item->nom_ville_geo,
                'profil' => $item->profil,
                'lat' => $item->latitude_ville_geo,
                'lng' => $item->longitude_ville_geo
            ];
        }

        $marker = json_encode($markers);
        return view('frontend.adherent.ousetrouventnosadherents', ['marker' => $marker]);
    }
}
