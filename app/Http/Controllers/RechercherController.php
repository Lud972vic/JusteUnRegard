<?php

namespace App\Http\Controllers;

use App\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class RechercherController extends Controller
{
    /*A partir de l'input Recherche, on trouve le mot dans les colonnes desc_media, lib_media et on retourne le ou les médias dasn une vue pour l'utilisateur*/
    public function rechercher()
    {
        $keywords = Input::get('search');
        $keywords = Media::where('desc_media', 'LIKE', '%' . $keywords . '%')
            ->orWhere('lib_media', 'LIKE', '%' . $keywords . '%')->paginate(4);

        return view('frontend.rechercher.rechercher', ['keywords' => $keywords]);
    }
}
