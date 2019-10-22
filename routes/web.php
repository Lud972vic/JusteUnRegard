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

/*Inscription*/
Route::get('inscription', 'UserController@index')->name('inscription');
Route::post('inscription', 'UserController@create')->name('validation_inscription');
Route::get('seconnecter', 'UserController@formulaire')->name('seconnecter');
Route::post('seconnecter', 'UserController@traitement')->name('seconnecter');
/*Si identifié, on redirige l'utilisateur sur son compte*/
Route:: get('moncompte', 'UserController@moncompte')->name('moncompte ');
Route:: post('edit', 'UserController@edit')->name('edit');
Route:: get('deconnection', 'UserController@deconnection')->name('deconnection');

/*Nos adhérents*/
Route::get('ousetrouventnosadherents', 'Frontend\AdherentController@index')->name('ousetrouventnosadherents');

/*Qui sommes-nous?*/
Route::get('nouscontacter', 'Frontend\ContactController@getNousContacter')->name('nouscontacter');
Route::post('nouscontacter', 'Frontend\ContactController@postNousContacter')->name('nouscontacter');
Route::get('notreequipe', 'Frontend\ContactController@getNotreEquipe')->name('notreequipe');

/*Catégories -> Vos photographies*/
Route::get('murdephotographie', 'Frontend\CategoriesController@index')->name('murdephotographie');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

/*en test*/
/*Activer la vérification des e-mails*/
Auth::routes(['verify' => true]);

Route::get('profile', function () {
    // Seuls les utilisateurs vérifiés peuvent entrer ...
})->middleware('verified');
