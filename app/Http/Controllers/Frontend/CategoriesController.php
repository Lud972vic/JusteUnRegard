<?php

namespace App\Http\Controllers\Frontend;

use App\Media;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function index()
    {
//        $murPhotos = DB::table('adherents')
//            ->join('villesgeos', 'adherents.ville_geo_id', '=', 'villesgeos.id')
//            ->join('profils', 'adherents.profil_id', '=', 'profils.id')
//            ->join('medias', 'medias.adh_id', '=', 'adherents.id')
//            ->join('categories'0, 'categories.id', '=', 'medias.cat_id')
////            ->select('adherents.pseudo_adh', 'adherents.photo_adh', 'villesgeos.nom_ville_geo', 'profils.profil',
////                'medias.lib_media', 'medias.dt_creation_media', 'medias.desc_media', 'medias.dure_media', 'medias.url_media', 'categories.lib_cat')
//            ->orderByRaw('RAND()')->take(12)
//            ->get();
//        return view('frontend.categories.vosphotographies.index', ['murPhotos' => $murPhotos]);

        $medias = Media::where('type_fichier_media', '=', 'image/jpeg')->orderByRaw('RAND()')->paginate(12);
        $users = User::all();
        return view('frontend.categories.vosphotographies.index', ['medias' => $medias, 'users' => $users]);
    }
}
