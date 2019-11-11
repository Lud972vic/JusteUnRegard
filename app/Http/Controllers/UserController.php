<?php

namespace App\Http\Controllers;

use App\Accessoirepublicite;
use App\Media;
use App\Typeannonce;
use App\User;
use App\Civilite;
use App\Ville;
use App\Profil;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $civilites = Civilite::all();
        $villes = Ville::all(['id', 'code_postal_ville_geo', 'nom_ville_geo']);
        $profils = Profil::all();

        return view('Frontend.inscription.inscription', ['civilites' => $civilites, 'villes' => $villes, 'profils' => $profils]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|min:2|max:50',
                'prenom_adh' => 'required|min:2|max:50',
                'pseudo_adh' => 'required|min:2|max:50',
                'email' => 'required|min:10|max:50',
                'emailconfirm' => 'required|min:10|max:50',
                'password' => 'required|min:8|max:50',
                'passwordconfirm' => 'required|min:8|max:50',
                'civilite_id' => 'required',
                'profil_id' => 'required',
                'ville_id' => 'required',
                'photo_adh' => 'image|mimes:jpeg,png,jpg|max:5000'
//              'acceptcondition' => 'required'
            ]
        );

        $user = new User();

        $user->name = request('name');
        $user->prenom_adh = request('prenom_adh');
        $user->pseudo_adh = request('pseudo_adh');
        $user->email = request('email');
//      Hash du mot de passe
        $user->password = bcrypt(request('password'));
        $user->civilite_id = request('civilite_id');
        $user->profil_id = request('profil_id');
        $user->ville_id = request('ville_id');
//      $user->acceptcondition = request('acceptcondition');
//      Vérifier si une photo est envoyée, puis la redimensionne et la sauvegarde
        if (isset($request->photo_adh)) {
            $nameImage = $request->file('photo_adh')->getClientOriginalName();
            $user->photo_adh = $nameImage;
            $img = Image::make($request->file('photo_adh')->getRealPath());
            $img->insert(public_path('./img/logo/jur.png'), 'bottom-right', 10, 10);
            $img->resize(null, 1080, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img->save('./img/adherent/avatars/' . $nameImage);
        }

        $user->save();
        return view('Frontend.inscription.merci');
    }

    /*Se connecter*/
    public function formulaire()
    {
        return view('auth.login');
    }

    public function traitement()
    {
        request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $resultat = auth()->attempt([
            'email' => request('email'),
            'password' => request('password'),
        ]);

        if ($resultat) {
            return redirect('voirmoncompte');
        } else {
            //Si erreur, on retourne sur la page de connexion et on garde l'email utilisateur
            return back()->withInput()->withErrors(['email' => 'Vos identifiants sont incorrects.']);
        };
    }

    /*Mon compte utilisateur*/
    public function voirmoncompte()
    {
        /*On vérifie si l'utilisateur est connecté, par défaut guest (non connecté)*/
        if (auth()->guest()) {
            flash('Vous devez être connecté pour voir cette page.')->error()->important();
            return redirect('seconnecter');
        }

        $civilites = Civilite::all();
        $villes = Ville::all();
        $profils = Profil::all();
        $users = User::find(auth()->user()->id);
        $mediasImages = Media::where('user_id', '=', $users->id)
            ->where('type_fichier_media', '=', 'image/jpeg')
            ->paginate(4);

        $accessoires = Accessoirepublicite::where('user_id', '=', $users->id)
            ->where('typeannonce_id', '=', '2')
            ->paginate(4);

        $publicites = Accessoirepublicite::where('user_id', '=', $users->id)
            ->where('typeannonce_id', '=', '1')
            ->paginate(4);

        $typeannonces = Typeannonce::all();

        $mediasTutoriaux = Media::where('user_id', '=', $users->id)->where('type_fichier_media', '=', 'video/mp4')->paginate(4);
        return view('frontend.inscription.voirmoncompte', ['civilites' => $civilites, 'villes' => $villes, 'profils' => $profils, 'users' => $users,
            'mediasImages' => $mediasImages, 'mediasTutoriaux' => $mediasTutoriaux, 'accessoires' => $accessoires, 'typeannonces' => $typeannonces, 'publicites' => $publicites]);
    }

    /*Déconnection de l'utilisateur et redirection vers la page d'accueil*/
    public function deconnectermoncompte()
    {
        auth()->logout();
        return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function editermoncompte(Request $request)
    {
        /*Recuperer les informations de l'utilisateur connecté*/
        if (auth()->guest()) {
            flash('Vous devez être connecté pour voir cette page.')->error()->important();
            return redirect('seconnecter');
        }


//        dd($request);

        $request->validate(
            [
                'name' => 'required|min:2|max:50',
                'prenom_adh' => 'required|min:2|max:50',
                'pseudo_adh' => 'required|min:2|max:50',

                /*Vérification de l'email*/
                'email' => 'required|confirmed|min:10|max:50',
                'email_confirmation' => 'required',

                'civilite_id' => 'required',
                'profil_id' => 'required',
                'ville_id' => 'required',
                'photo_adh' => 'image|mimes:jpeg,png,jpg|max:5000'
            ]
        );


        /*On vérifie, si l'utilisateur a téléchargé un nouveau avatar*/
        if (isset($request->photo_adh)) {
            //Recupérer le nom de l'image saisi par l'utilisateur et tague de celui-ci
            $img = Image::make($request->file('photo_adh')->getRealPath());
            //Extension de l'image
            $ext = $request->file('photo_adh')->getClientOriginalExtension();
            //Dossier public pour le fichier watermark.png
            $img->insert(public_path('watermark.png'), 'bottom-right', 50, 50);
            //On redimensionne l'image
            $img->resize(null, 480, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            //On renomme l'image avec l'id, le nom de l'utilisateur, un id unique et l'extension
            $new_img = auth()->user()->id . '_' . auth()->user()->name . '_' . uniqid() . '.' . $ext;
            //Le chemin complet avec le nom du fichier
            $new_path_img = '/img/adherent/avatars/' . $new_img;
            //On sauvegarde l'image dans le nouveau repertoire de partage
            $img->save(public_path() . $new_path_img);
        } else {
            /*Si pas de nouveau avatar, on vérifie si dans la base de donnée un avatar existe*/
            if (isset($request->photo_adh_hidden)) {
                $new_img = $request->photo_adh_hidden;
            } else {
                /*Sinon on met un avatar par defaut*/
                $new_img = 'avatar_par_defaut.png';
            }
        }

        /*Si nouveau mot de passe, on crypte celui-ci, sinon on garde l'ancien dans la base de donnée*/

        /*Le mot de passe actuel crypté*/
        $password = (request('password_hidden'));

        if (/*On verifie que les mots de passse sont identiques*/
            (request('password') == request('password_confirmation'))
            &&
            /*On verifie que les valeurs sont différentes de null*/
            (request('password') != null && request('password_confirmation') != null)
            &&
            /*On vérifie le nombre de caractere du mot de passe*/
            (strlen(request('password')) >= 8 && strlen(request('password')) <= 50)
        ) {
            /*On génère le hash du nouveau mot de passe*/
            $password = bcrypt(request('password'));
            flash('Le nouveau mot de passe est sauvegardé.')->success();
        }

        auth()->user()->update([
            'civilite_id' => request('civilite_id'),
            'name' => request('name'),
            'prenom_adh' => request('prenom_adh'),
            'pseudo_adh' => request('pseudo_adh'),
            'email' => request('email'),
            'password' => $password,
            'photo_adh' => $new_img,
            'profil_id' => request('profil_id'),
            'dt_naiss_adh' => request('dt_naiss_adh'),
            'telephone_adh' => request('telephone_adh'),
            'descrip_adh' => request('descrip_adh'),
            'ville_id' => request('ville_id'),
            'cpt_instagram' => request('cpt_instagram'),
            'cpt_facebook' => request('cpt_facebook'),
            'cpt_rs_autre' => request('cpt_rs_autre')
        ]);

        flash('Mise à jour de votre compte avec succès !')->success();
        return redirect('voirmoncompte');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return Response
     */
    public function update($id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $request
     * @return Response
     */
    public function supprimermoncompte(Request $request)
    {
        /*Supprimer son compte utilisateur*/
        $user = User::find($request->id);
        $user->delete();
        return redirect()->route('index');
        flash('Désolé de vous voir partir, surement à bientôt !')->success();
    }
}

?>
