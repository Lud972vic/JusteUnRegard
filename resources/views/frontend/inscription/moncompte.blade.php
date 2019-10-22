@extends('default')

@section('content')

    <div class="container">
        <br>
        <div class="row">
            <div class="col-8">
                <h1>Mon compte</h1>
                <p>Vous êtes bien
                    connecté,
                    <strong>{{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->name }}}</strong> !</p>
                <p> {{request('pseudo_adh')}}</p>
            </div>
            <div class="col-4">
                <a class="btn btn-outline-secondary" href="deconnection">Déconnexion</a>
            </div>

            <!-- Nav pills -->
            <ul class="nav nav-pills" role="tablist">
                <li class="nav-item">
                    <a class="nav-link nav-link_black active" id="profile_tab" data-toggle="pill" href="#votre_profile">Votre
                        profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link_black" id="images_gestion_tab" data-toggle="pill"
                       href="#gerer_vos_images">Gérer vos images</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link_black" data-toggle="pill" href="#gerer_vos_tutoriaux">Gérer vos
                        tutoriaux</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link_black" data-toggle="pill" href="#vendre_un_produit">Vendre un
                        produit</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link_black" data-toggle="pill" href="#faire_de_la_publicite">Faire de la
                        publicité</a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Tab panes -->
    <div class="tab-content">
        <div id="votre_profile" class="container tab-pane active"><br>
            <div class="mask rgba-black-light d-flex justify-content-center align-items-center">
                <div class="container">
                    <div class="row fadeIn">
                        <div class="col col-md-4 white-text text-center text-md-left">
                            <img width="50%" class="img-fluid rounded mb-4" style="border: 1px solid darkgrey"
                                 src="{{asset('img/adherent/avatars/'. $users->photo_adh)}}"
                                 alt="">
                        </div>
                        <div class="col col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <form method="post" action="edit" enctype="multipart/form-data">
                                        @csrf

                                        @if ($errors->any())
                                            <div class="alert-info text-center">
                                                @foreach($errors->all() as $error)
                                                    <p>*** {{$error}} ***</p>
                                                @endforeach
                                            </div>
                                        @endif

                                        <p class="h4 text-center mb-4">Compte sur JusteUnRegard</p>

                                        <div class="md-form">
                                            <i class="fa fa-user prefix grey-text"></i>
                                            <label for="name">Nom <span style="color: red">*</span></label>
                                            <input type="text" name="name" id="name" placeholder="Ex: Dupond"
                                                   class="form-control" value="{{$users->name}}">
                                        </div>

                                        <div class="md-form">
                                            <i class="fa fa-user prefix grey-text"></i>
                                            <label for="prenom_adh">Prenom <span
                                                    style="color: red">*</span></label>
                                            <input type="text" name="prenom_adh" id="prenom_adh"
                                                   placeholder="Ex: Pierre"
                                                   class="form-control" value="{{$users->prenom_adh}}">
                                        </div>

                                        <div class="md-form">
                                            <i class="fa fa-user prefix grey-text"></i>
                                            <label for="dt_naiss_adh">Date de naissance</label>
                                            <input type="date" name="dt_naiss_adh" id="dt_naiss_adh"
                                                   placeholder="Ex: 25/12/2001"
                                                   class="form-control" value="{{$users->dt_naiss_adh}}">
                                        </div>

                                        <div class="md-form">
                                            <i class="fa fa-user prefix grey-text"></i>
                                            <label for="telephone_adh">Téléphone</label>
                                            <input type="tel" name="telephone_adh" id="telephone_adh"
                                                   placeholder="Ex: +3360102030405"
                                                   class="form-control" value="{{$users->telephone_adh}}">
                                        </div>

                                        <div class="md-form">
                                            <i class="fa fa-user prefix grey-text"></i>
                                            <label for="pseudo_adh">Pseudo <span
                                                    style="color: red">*</span></label>
                                            <input type="text" name="pseudo_adh" id="pseudo_adh"
                                                   placeholder="Ex: Passion"
                                                   class="form-control" value="{{$users->pseudo_adh}}">
                                        </div>

                                        <div class="md-form">
                                            <i class="fa fa-user prefix grey-text"></i>
                                            <label for="photo_adh">Photo</label>
                                            <input type="file" name="photo_adh" id="photo_adh"
                                                   placeholder="Ex: Votre photo/avatar"
                                                   class="form-control" value="{{$users->photo_adh}}">
                                        </div>

                                        <div class="md-form">
                                            <i class="fa fa-user prefix grey-text"></i>
                                            <label for="cpt_instagram">Compte Instagram <span
                                                    style="color: red">*</span></label>
                                            <input type="text" name="cpt_instagram" id="cpt_instagram"
                                                   placeholder="Ex: https://moncompte"
                                                   class="form-control" value="{{$users->cpt_instagram}}">
                                        </div>

                                        <div class="md-form">
                                            <i class="fa fa-user prefix grey-text"></i>
                                            <label for="cpt_facebook">Compte FaceBook <span
                                                    style="color: red">*</span></label>
                                            <input type="text" name="cpt_facebook" id="cpt_facebook"
                                                   placeholder="Ex: https://moncompte"
                                                   class="form-control" value="{{$users->cpt_facebook}}">
                                        </div>

                                        <div class="md-form">
                                            <i class="fa fa-user prefix grey-text"></i>
                                            <label for="cpt_rs_autre">Compte Autre <span
                                                    style="color: red">*</span></label>
                                            <input type="text" name="cpt_rs_autre" id="cpt_rs_autre"
                                                   placeholder="Ex: https://moncompte"
                                                   class="form-control" value="{{$users->cpt_rs_autre}}">
                                        </div>

                                        <div class="md-form">
                                            <i class="fa fa-envelope prefix grey-text"></i>
                                            <label for="email">Email <span style="color: red">*</span></label>
                                            <input type="email" name="email" id="email"
                                                   placeholder="Ex: Dupond@free.fr" class="form-control"
                                                   value="{{$users->email}}">
                                        </div>

                                        <div class="md-form">
                                            <i class="fa fa-envelope prefix grey-text"></i>
                                            <label for="emailconfirm">Confirmer votre email <span
                                                    style="color: red">*</span></label>
                                            <input type="email" name="emailconfirm"
                                                   id="emailconfirm"
                                                   placeholder="Ex: Dupond@free.fr" class="form-control"
                                                   value="{{$users->emailconfirm}}">
                                        </div>

                                        <div class="md-form">
                                            <i class="fa fa-lock prefix grey-text"></i>
                                            <label for="password">Votre mot de passe <span
                                                    style="color: red">*</span></label>
                                            <input type="password" name="password"
                                                   id="password" placeholder="Ex: *****"
                                                   class="form-control" value="{{$users->password}}">
                                        </div>

                                        <div class="md-form">
                                            <i class="fa fa-lock prefix grey-text"></i>
                                            <label for="passwordconfirm">Confirmer votre mot de
                                                passe <span style="color: red">*</span></label>
                                            <input type="password" name="passwordconfirm"
                                                   id="passwordconfirm" placeholder="Ex: *****"
                                                   class="form-control" value="{{$users->password}}">
                                        </div>

                                        <div class="md-form">
                                            <i class="fa fa-restroom prefix grey-text"></i>
                                            <label for="civilite_id">Votre civilité <span
                                                    style="color: red">*</span></label>
                                            <select class="form-control" id="civilite_id" name="civilite_id"
                                                    value="{{$users->civilite_id}}">
                                                @foreach($civilites as $civilite)
                                                    <option
                                                        value="{{$civilite->id}}">{{$civilite->civ}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="md-form">
                                            <i class="fa fa-restroom prefix grey-text"></i>
                                            <label for="profil_id">Votre profil <span
                                                    style="color: red">*</span></label>
                                            <select class="form-control" id="profil_id" name="profil_id"
                                                    value="{{$users->profil_id}}">
                                                @foreach($profils as $profil)
                                                    <option value="{{$profil->id}}">{{$profil->profil}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="md-form">
                                            <i class="fa fa-map-marker-alt prefix grey-text"></i>
                                            <label for="ville_id">Votre département <span
                                                    style="color: red">*</span></label>
                                            <select class="form-control" id="ville_id" name="ville_id"
                                                    value="{{$users->ville_id}}">
                                                {{--                                                        @foreach($villes as $ville)--}}
                                                {{--                                                            <option--}}
                                                {{--                                                                value="{{$ville->id}}">{{"(" . $ville->code_postal_ville_geo . ") " . $ville->nom_ville_geo}}</option>--}}
                                                {{--                                                        @endforeach--}}
                                            </select>
                                        </div>

                                        <div class="text-center mt-4">
                                            <button class="btn btn-outline-danger buttonPaddingLeft" type="submit"
                                                    data-toggle="modal"
                                                    data-target="#myModal" required>Supprimer mon compte
                                            </button>
                                        </div>
                                        <div class="text-center mt-4">
                                            <button class="btn btn-outline-warning" type="submit"
                                                    data-toggle="modal"
                                                    data-target="#myModal" required>Mettre à jour mon profil
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="gerer_vos_images" class="container tab-pane fade"><br>
            <div class="row">
                <div class="col-9 text-md-right">
                    <p>Ajouter vos photographies</p>
                </div>
                <div class="col-3 text-md-left">
                    <a href="index.php" class="btn btnMedia btn-outline-warning">Sortir</a>
                    <a href="user_media_insert.php" class="btn btnMedia btn-outline-primary">Ajouter</a>
                </div>
            </div>
            <br><br>
            <div class="row text-center">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Média</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="gerer_vos_tutoriaux" class="container tab-pane fade"><br>
            <div class="row">
                <div class="col-9 text-md-right">
                    <p>Ajouter vos vidéos</p>
                </div>
                <div class="col-3 text-md-left">
                    <a href="index.php" class="btn btnMedia btn-outline-warning">Sortir</a>
                    <a href="user_media_insert.php" class="btn btnMedia btn-outline-primary">Ajouter</a>
                </div>
            </div>
            <br><br>
            <div class="row text-center">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Média</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="vendre_un_produit" class="container tab-pane fade"><br>
            <div class="row">
                <div class="col-9 text-md-right">
                    <p>Vendre un produit</p>
                </div>
                <div class="col-3 text-md-left">
                    <a href="index.php" class="btn btnMedia btn-outline-warning">Sortir</a>
                    <a href="user_media_insert.php" class="btn btnMedia btn-outline-primary">Ajouter</a>
                </div>
            </div>
            <br><br>
            <div class="row text-center">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Média</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="faire_de_la_publicite" class="container tab-pane fade"><br>
            <div class="row">
                <div class="col-9 text-md-right">
                    <p>Faire de la publicité</p>
                </div>
                <div class="col-3 text-md-left">
                    <a href="index.php" class="btn btnMedia btn-outline-warning">Sortir</a>
                    <a href="user_media_insert.php" class="btn btnMedia btn-outline-primary">Ajouter</a>
                </div>
            </div>
            <br><br>
            <div class="row text-center">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Média</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!--Début : Les Scripts JS-->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/userprofile.js')}}"></script>
    <!--Fin : Les Scripts JS-->

    <!--Bouton retour nav-pills-->
    <script>
        var url = document.location.toString();
        if (url.match('#')) {
            $('.nav-pills a[href="#' + url.split('#')[1] + '"]').tab('show');
        }
    </script>
@endsection
