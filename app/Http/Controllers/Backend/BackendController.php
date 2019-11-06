<?php

namespace App\Http\Controllers\Backend;

use App\Compte;
use App\Media;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BackendController extends Controller
{
    /*Voir tous les utilisateurs*/
    public function show_users()
    {
        $utilisateurs = User::where('is_admin', '=', '0')->where('compte_id', '=', '1')->paginate(5);
        $utilisateursbannis = User::where('is_admin', '=', '0')->where('compte_id', '=', '2')->paginate(5);
        $comptes = Compte::all();
        return view('backend.utilisateur.show', ['utilisateurs' => $utilisateurs, 'utilisateursbannis' => $utilisateursbannis, 'comptes' => $comptes]);
    }

    /*Editer un utilisateur*/
    public function edit_user(Request $request)
    {
        $compte = Compte::all();
        $utilisateur = User::find($request->id);
        return view('backend.utilisateur.edit', ['utilisateur' => $utilisateur, 'compte' => $compte]);
    }

    /*Modifier le compte d'un utilisateur*/
    public function update_user(Request $request)
    {
        $utilisateur = User::find($request->id);
        $utilisateur->compte_id = $request->compte_id;
        $utilisateur->save();

        flash('L\'état du compte de (' . $utilisateur->pseudo_adh . ') a bien été actualisé.')->success();
        return redirect('gestiondesutilisateurs');
    }


    /*Voir toutes les photographies*/
    public function show_photos()
    {
        $medias = Media::where('type_fichier_media', '=', 'image/jpeg')->where('bannir', "=", "1")->paginate(3);
        $mediasbannis = Media::where('type_fichier_media', '=', 'image/jpeg')->where('bannir', "=", "2")->paginate(3);
        $comptes = Compte::all();
        return view('backend.photographies.show', ['medias' => $medias, 'mediasbannis' => $mediasbannis, 'comptes' => $comptes]);
    }

    /*Editer une photo*/
    public function edit_photo(Request $request)
    {
        $compte = Compte::all();
        $media = Media::find($request->id);
        return view('backend.photographies.edit', ['media' => $media, 'compte' => $compte]);
    }

    /*Modifier le compte d'une photo*/
    public function update_photo(Request $request)
    {
        $media = Media::find($request->id);
        $media->bannir = $request->bannir_id;
        $media->banni_par_user = "Admin JUR";
        $media->save();

        flash('L\'état de la photographie (' . $media->lib_media . ') a bien été actualisé.')->success();
        return redirect('gestiondesutilisateurs');
    }


    /*Voir toutes les tutoriels*/
    public function show_tutoriels()
    {
        $medias = Media::where('type_fichier_media', '=', 'video/mp4')->where('bannir', "=", "1")->paginate(3);
        $mediasbannis = Media::where('type_fichier_media', '=', 'video/mp4')->where('bannir', "=", "2")->paginate(3);
        $comptes = Compte::all();
        return view('backend.tutoriels.show', ['medias' => $medias, 'mediasbannis' => $mediasbannis, 'comptes' => $comptes]);
    }

    /*Editer un tutoriel*/
    public function edit_tutoriel(Request $request)
    {
        $compte = Compte::all();
        $media = Media::find($request->id);
        return view('backend.tutoriels.edit', ['media' => $media, 'compte' => $compte]);
    }

    /*Modifier le compte d'un tutoriel*/
    public function update_tutoriel(Request $request)
    {
        $media = Media::find($request->id);
        $media->bannir = $request->bannir_id;
        if ($request->bannir_id == 1) {
            $tmp = null;
        } else {
            $tmp = "Admin JUR";
        };
        $media->banni_par_user = $tmp;
        $media->save();

        flash('L\'état du tutoriel (' . $media->lib_media . ') a bien été actualisé.')->success();
        return redirect('gestiondesutilisateurs');
    }
}
