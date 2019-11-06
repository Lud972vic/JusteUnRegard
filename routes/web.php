<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome')->name('main');
//});

//Route::get('user', 'UserController')->name('user');
//Route::get('civilite', 'CiviliteController')->name('civilite');
//Route::get('accessoirepublicite', 'AccessoirepubliciteController')->name('accessoirepublicite');
//Route::get('categorie', 'CategorieController')->name('categorie');
//Route::get('commentaire', 'CommentaireController')->name('commentaire');
//Route::get('don', 'DonController')->name('don');
//Route::get('media', 'MediaController')->name('media');
//Route::get('countrie', 'CountrieController')->name('countrie');
//Route::get('profil', 'ProfilController')->name('profil');
//Route::get('compte', 'CompteController')->name('compte');
//Route::get('tchat', 'TchatController')->name('tchat');
//Route::get('typeannonce', 'TypeannonceController')->name('typeannonce');
//Route::get('ville', 'VilleController')->name('ville');

/*Index*/
Route::get('/', "Frontend\MainController@index")->name('index');

/*Moteur de recherche*/
Route::post('/', "RechercherController@rechercher")->name('rechercher');

/*Inscription*/
Route::get('inscription', 'UserController@index')->name('inscription');
Route::post('inscription', 'UserController@create')->name('validation_inscription');
Route::get('seconnecter', 'UserController@formulaire')->name('seconnecter');
Route::post('seconnecter', 'UserController@traitement')->name('seconnecter');

/*Si identifié, on redirige l'utilisateur sur son compte*/
Route:: get('voirmoncompte', 'UserController@voirmoncompte')->name('voirmoncompte');
Route:: post('editermoncompte', 'UserController@editermoncompte')->name('editermoncompte');
Route:: get('deconnectermoncompte', 'UserController@deconnectermoncompte')->name('deconnectermoncompte');
Route:: get('supprimermoncompte', 'UserController@supprimermoncompte')->name('supprimermoncompte');

/*Donnation*/
Route:: get('donnation', 'ProcessController@donnation')->name('donnation');
Route:: get('paiement/{donnation}/{libelle}', 'ProcessController@paiement')->name('paiement');
Route:: get('paiement', 'ProcessController@paiement_confirmation')->name('paiement_confirmation');

/*Nos adhérents*/
Route::get('ousetrouventnosadherents', 'Frontend\AdherentController@ousetrouventnosadherents')->name('ousetrouventnosadherents');

/*Qui sommes-nous?*/
Route::get('nouscontacter', 'Frontend\ContactController@getNousContacter')->name('nouscontacter');
Route::post('nouscontacter', 'Frontend\ContactController@postNousContacter')->name('nouscontacter');
Route::get('notreequipe', 'Frontend\ContactController@getNotreEquipe')->name('notreequipe');

/*Catégories -> Vos photographies*/
Route::get('murdephotographies', 'Frontend\CategoriesController@murdephotographies')->name('murdephotographies');
Route::get('murdetutoriels', 'Frontend\CategoriesController@murdetutoriels')->name('murdetutoriels');
Route::get('voirphoto/{id}', 'Frontend\CategoriesController@voirphoto')->name('voirphoto');
Route::get('supprimerphoto/{id}', 'Frontend\CategoriesController@supprimerphoto')->name('supprimerphoto');
Route::post('supprimerphoto/{id}', 'Frontend\CategoriesController@supprimerphoto_confirmation')->name('supprimerphoto_confirmation');
Route::get('modifiermedia/{id}', 'Frontend\CategoriesController@modifiermedia')->name('modifiermedia');
Route::post('modifiermedia/{id}', 'Frontend\CategoriesController@modifiermedia_confirmation')->name('modifiermedia_confirmation');

Route::get('ajouterphoto', 'Frontend\CategoriesController@ajouterphoto')->name('ajouterphoto');
Route::get('ajoutervideo', 'Frontend\CategoriesController@ajoutervideo')->name('ajoutervideo');
Route::post('ajouterphoto', 'Frontend\CategoriesController@ajouterphoto_confirmation')->name('ajouterphoto_confirmation');
Route::post('ajoutervideo', 'Frontend\CategoriesController@ajoutervideo_confirmation')->name('ajoutervideo_confirmation');

/*Ajouter un commentaire*/
Route::post('ajoutercommentaire', 'CommentaireController@ajoutercommentaire')->name('ajoutercommentaire');
Route::post('bannirmedia', 'MediaController@bannirmedia')->name('bannirmedia');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

/*Activer la vérification des e-mails*/
Auth::routes(['verify' => true]);

/*Seuls les utilisateurs vérifiés peuvent entrer ...*/
Route::get('profile', function () {
})->middleware('verified');

/*Backend*/
Route::middleware('verify.admin')->group(function () {
    Route:: get('gestiondesutilisateurs', 'Backend\BackendController@show_users')->name('gestiondesutilisateursshow_users');
    Route:: get('gestiondesutilisateur/{id}/{compte}', 'Backend\BackendController@edit_user')->name('gestiondesutilisateursedit_user');
    Route:: post('gestiondesutilisateur/{id}/{compte}', 'Backend\BackendController@update_user')->name('gestiondesutilisateursupdate_user');

    Route:: get('gestiondesphotographies', 'Backend\BackendController@show_photos')->name('gestiondesphotographiesshow_photos');
    Route:: get('gestiondesphotographie/{id}/{media}', 'Backend\BackendController@edit_photo')->name('gestiondesphotographiesedit_photo');
    Route:: post('gestiondesphotographie/{id}/{media}', 'Backend\BackendController@update_photo')->name('gestiondesphotographiesupdate_photo');

    Route:: get('gestiondestutoriels', 'Backend\BackendController@show_tutoriels')->name('gestiondestutorielsshow_tutoriels');
    Route:: get('gestiondestutoriel/{id}/{media}', 'Backend\BackendController@edit_tutoriel')->name('gestiondestutorielsedit_tutoriel');
    Route:: post('gestiondestutoriel/{id}/{media}', 'Backend\BackendController@update_tutoriel')->name('gestiondestutorielsupdate_tutoriel');
});
//Route::get('***le nom pour l'url***', '***le controller et la méthode***')->name('***alias***');
