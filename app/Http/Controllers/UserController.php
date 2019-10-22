<?php

namespace App\Http\Controllers;

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
        $villes = Ville::all();
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
//                'acceptcondition' => 'required'
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
            return redirect('moncompte');
        } else {
            //Si erreur, on retourne sur la page de connexion et on garde l'email utilisateur
            return back()->withInput()->withErrors(['email' => 'Vos identifiants sont incorrects.']);
        };
    }


    /*Mon compte utilisateur*/
    public function moncompte()
    {
        /*On vérifie si l'utilisateur est connecté, par défaut guest (non connecté)*/
        if (auth()->guest()) {
            flash('Vous devez être connecté pour voir cette page.')->error()->important();
            return redirect('seconnecter');
        }

        $civilites = Civilite::all();
        $villes = Ville::all();
        $profils = Profil::all();
        $users = User::all()->where('id', '=', '105')->first();

        ($users);

        return view('frontend.inscription.moncompte', ['civilites' => $civilites, 'villes' => $villes, 'profils' => $profils, 'users' => $users]);
    }

    /*Déconnection de l'utilisateur et redirection vers la page d'accueil*/
    public function deconnection()
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
    public function edit(Request $request)
    {
        /*Recuperer les informations de l'utilisateur connecté*/
        if (auth()->guest()) {
            flash('Vous devez être connecté pour voir cette page.')->error()->important();
            return redirect('seconnecter');
        }

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
            ]
        );

        if (isset($request->photo_adh)) {
            $nameImage = $request->file('photo_adh')->getClientOriginalName();
            $img = Image::make($request->file('photo_adh')->getRealPath());
            $img->insert(public_path('./img/logo/jur.png'), 'bottom-right', 10, 10);
            $img->resize(null, 1080, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img->save('./img/adherent/avatars/' . $nameImage);
        }

        auth()->user()->update([
            'name' => request('name'),
            'prenom_adh' => request('prenom_adh'),
            'pseudo_adh' => request('pseudo_adh'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'civilite_id' => request('civilite_id'),
            'profil_id' => request('profil_id'),
            'ville_id' => request('ville_id'),
            'photo_adh' => $nameImage,
        ]);

        flash('Mise à jour de votre compte avec succès !')->success();
        return redirect('moncompte');
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
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {

    }

}

?>
