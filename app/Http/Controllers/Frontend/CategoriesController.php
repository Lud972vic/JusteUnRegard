<?php

namespace App\Http\Controllers\Frontend;

use App\Accessoirepublicite;
use App\Categorie;
use App\Media;
use App\Typeannonce;
use App\User;
use http\Params;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;

class CategoriesController extends Controller
{
    public function murdephotographies()
    {
        $medias = Media:: where('type_fichier_media', '=', 'image/jpeg')
            ->where('bannir', '=', '1')->paginate(12);
        $users = User::all();
        $categories = Categorie::orderBy('lib_cat', 'asc')->get();

        return view('frontend.categories.vosphotographies.murdephotographies', ['medias' => $medias, 'users' => $users, 'categories' => $categories]);
    }

    public function murdephotographiescat(Request $request)
    {
        //dd(request());
        $medias = Media::where('categorie_id', '=', request('cat'))->where('type_fichier_media', '=', 'image/jpeg')->where('bannir', '=', '1')->paginate(12);
        $categories = Categorie::orderBy('lib_cat', 'asc')->get();
        $users = User::all();
        return view('frontend.categories.vosphotographies.murdephotographies', ['medias' => $medias, 'users' => $users, 'categories' => $categories]);
    }


    public function murdetutoriels()
    {
        $medias = Media::where('type_fichier_media', '=', 'video/mp4')->where('bannir', '=', '1')->paginate(6);
        $users = User::all();
        return view('frontend.categories.vosphotographies.murdetutoriels', ['medias' => $medias, 'users' => $users]);
    }

    public function voirmedia(Request $request)
    {
        $media = Media::find($request->id);
        return view('frontend.categories.vosphotographies.voirmedia', ['media' => $media]);
    }

    public function voiraccessoirepub(Request $request)
    {
        $accessoirepub = Accessoirepublicite::find($request->id);
        return view('frontend.categories.vosphotographies.voiraccessoirepub', ['accessoirepub' => $accessoirepub]);
    }

    public function modifiermedia(Request $request)
    {
        $media = Media::find($request->id);
        $categories = Categorie::all();
        return view('frontend.categories.vosphotographies.modifiermedia', ['media' => $media, 'categories' => $categories]);
    }

    public function modifiermedia_confirmation(Request $request)
    {
        $media = Media::find($request->id);
        $media->lib_media = request('lib_media');
        $media->categorie_id = request('categorie_id');
        $media->desc_media = request('desc_media');
        $media->save();

        flash('Le média (' . $media->lib_media . ') a bien été actualisé.')->success();
        return back();
    }

    public function supprimermedia(Request $request)
    {
        $media = Media::find($request->id);
        return view('frontend.categories.vosphotographies.supprimermedia', ['media' => $media]);
    }

    public function supprimeraccessoirepub(Request $request)
    {
        $accessoire = Accessoirepublicite::find($request->id);
        return view('frontend.categories.vosphotographies.supprimeraccessoirepub', ['accessoire' => $accessoire]);
    }


    public function supprimermedia_confirmation(Request $request)
    {
        $media = Media::find($request->id);
        $media->delete();
        flash('Le média <strong>' . $media->nom_media . '</strong> a été supprimé.')->success();
        return redirect()->route('voirmoncompte');
    }

    public function supprimeraccessoirepub_confirmation(Request $request)
    {
        $accessoire = Accessoirepublicite::find($request->id);
        $accessoire->delete();
        flash('Le média <strong>' . $accessoire->lib_acc_pub . '</strong> a été supprimé.')->success();
        return redirect()->route('voirmoncompte');
    }

    /*Ajouter un média dans la table*/
    public function ajouterphoto()
    {
        $medias = Media::all();
        $categories = Categorie::all();

        return view('frontend.categories.vosphotographies.ajouterphoto', ['medias' => $medias, 'categories' => $categories]);
    }

    public function ajoutervideo()
    {
        $medias = Media::all();
        $categories = Categorie::all();

        return view('frontend.categories.vosphotographies.ajoutervideo', ['medias' => $medias, 'categories' => $categories]);
    }

    public function ajouterproduit()
    {
        $accessoires = Accessoirepublicite::all();
        $typeannonces = Typeannonce::all();
        return view('frontend.categories.vosphotographies.ajouterproduit', ['accessoires' => $accessoires, 'typeannonces' => $typeannonces]);
    }

    public function update_accessoire(Request $request)
    {
        if ($request->hasFile('url_img_1_acc_pub')) {
            //Recupérer le nom de l'image saisi par l'utilisateur et tague de celui-ci
            $img = Image::make($request->file('url_img_1_acc_pub')->getRealPath());
            //Extension de l'image
            $ext = $request->file('url_img_1_acc_pub')->getClientOriginalExtension();
            //Dossier public pour le fichier watermark.png
            $img->insert(public_path('watermark.png'), 'bottom-right', 50, 50);
            //On redimensionne l'image
            $img->resize(null, 1080, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            //On renomme l'image avec l'id, le nom de l'utilisateur, un id unique et l'extension
            $new_img = auth()->user()->id . '_' . auth()->user()->name . '_' . uniqid() . '.' . $ext;
            //Le chemin complet avec le nom du fichier
            $new_path_img = '/img/adherent/ventes/' . $new_img;
            //On sauvegarde l'image dans le nouveau repertoire de partage
            $img->save(public_path() . $new_path_img);
        }




        $accessoire = New Accessoirepublicite();
        $accessoire->lib_acc_pub = $request->lib_acc_pub;;
        $accessoire->desc_acc_pub = $request->desc_acc_pub;
        $accessoire->dt_debut_acc_pub = $request->dt_debut_acc_pub;
        $accessoire->dt_fin_acc_pub = $request->dt_fin_acc_pub;
        $accessoire->statut_visibilite_acc_pub = 1;
        $accessoire->url_img_1_acc_pub = $new_path_img;
        $accessoire->typeannonce_id = 2;
        $accessoire->user_id = auth()->user()->id;
        $accessoire->prix = $request->prix;



        $accessoire->save();

        flash('Le média <strong>' . $accessoire->lib_acc_pub . '</strong> a été ajouté.')->success();
        return redirect()->route('voirmoncompte');
    }


    public function ajouterphoto_confirmation(Request $request)
    {
//        $request->validate(
//            [
//                'nom_media' => 'required |min:5',
//                'lib_media' => 'required',
//                'taille_media' => 'required|image|max:20480',
//                'url_media' => 'required',
//                'desc_media' => 'required|min:30',
//                'type_fichier_media' => 'required',
//                'dure_media' => 'required',
//                'categorie_id' => 'required',
//                'user_id' => 'required'
//            ]
//        );

        if ($request->hasFile('url_media')) {
            //Recupérer le nom de l'image saisi par l'utilisateur et tague de celui-ci
            $img = Image::make($request->file('url_media')->getRealPath());
            //Extension de l'image
            $ext = $request->file('url_media')->getClientOriginalExtension();
            //Dossier public pour le fichier watermark.png
            $img->insert(public_path('watermark.png'), 'bottom-right', 50, 50);
            //On redimensionne l'image
            $img->resize(null, 1080, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            //On renomme l'image avec l'id, le nom de l'utilisateur, un id unique et l'extension
            $new_img = auth()->user()->id . '_' . auth()->user()->name . '_' . uniqid() . '.' . $ext;
            //Le chemin complet avec le nom du fichier
            $new_path_img = '/img/adherent/medias/' . $new_img;
            //On sauvegarde l'image dans le nouveau repertoire de partage
            $img->save(public_path() . $new_path_img);
        }

        $medias = New Media();
        $medias->nom_media = $new_img;
        $medias->lib_media = $request->lib_media;
        $medias->taille_media = $request->file('url_media')->getSize();
        $medias->url_media = $new_path_img;
        $medias->desc_media = $request->desc_media;
        $medias->type_fichier_media = $request->file('url_media')->getMimeType();
        $medias->dure_media = 0;
        $medias->categorie_id = $request->categorie_id;
        $medias->user_id = auth()->user()->id;
        $medias->save();

        flash('Le média <strong>' . $medias->lib_media . '</strong> a été ajouté.')->success();
        return redirect()->route('voirmoncompte');
    }

    public function ajoutervideo_confirmation(Request $request)
    {
        if ($request->hasFile('url_media')) {
            //Recupérer le fichier de l'utilisateur
            $file = $request->file('url_media');
            $file_OriginalName = $file->getClientOriginalName();
            $file_getSize = $file->getSize();
            $file_getMimeType = $file->getMimeType();

            //https://packagist.org/packages/james-heinrich/getid3
            // include getID3() library
            $getID3 = new \getID3;
//            // Initialize getID3 engine
            $file_tmp = $getID3->analyze($file);
//            // Analyze file and store returned data in $file_getTime
            $duration = date('H:i:s', $file_tmp['playtime_seconds']);

            //Extension du fichier
            $ext = $request->file('url_media')->getClientOriginalExtension();
            //On renomme le fchier avec "l'id, le nom de l'utilisateur, un id unique et l'extension"
            $new_img = auth()->user()->id . '_' . auth()->user()->name . '_' . uniqid() . '.' . $ext;
            //On déplace le fichier avec le nouveau nom
            $upload_ok = $file->move('img\adherent\medias/', $new_img);

            if ($upload_ok) {
                flash('Le média <strong>' . $new_img . '</strong> a été ajouté.')->success();

                $medias = New Media();
                $medias->nom_media = $file_OriginalName;
                $medias->lib_media = $request->lib_media;
                $medias->taille_media = $file_getSize;
                $medias->url_media = '/img/adherent/medias/' . $new_img;
                $medias->desc_media = $request->desc_media;
                $medias->type_fichier_media = $file_getMimeType;
                $medias->dure_media = $duration;
                $medias->categorie_id = $request->categorie_id;
                $medias->user_id = auth()->user()->id;
                $medias->save();
            } else {
                flash('Le média <strong>' . $new_img . '</strong> n\'a pas été ajouté.')->warning();
            }
            return redirect()->route('voirmoncompte');
        }
    }
}
