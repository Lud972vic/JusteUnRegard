@extends('default')

@section('title')
    JusteUnRegard - Accueil
@endsection

@section('content')
    <!-- Début : Container -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">Inscrivez-vous</h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="color-link" href="#">Accueil</a>
            </li>
            <li class="breadcrumb-item">S'inscrire</li>
            <li class="breadcrumb-item active">Inscrivez-vous</li>
        </ol>

        <div class="mask rgba-black-light d-flex justify-content-center align-items-center">
            <div class="container">
                <div class="row fadeIn">
                    <div class="col col-md-6 white-text text-center text-md-left">
                        <img class="img-fluid rounded mb-4" src="{{asset('./img/about/groupe.jpg')}}" alt="">
                    </div>
                    <div class="col col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <form method="post" action="inscription" enctype="multipart/form-data">
                                    @csrf

                                    @if ($errors->any())
                                        <div class="alert-info text-center">
                                            @foreach($errors->all() as $error)
                                                <p>*** {{$error}} ***</p>
                                            @endforeach
                                        </div>
                                    @endif

                                    <p class="h4 text-center mb-4">Bienvenue sur JusteUnRegard</p>

                                    <div class="md-form">
                                        <i class="fa fa-user prefix grey-text"></i>
                                        <label for="name">Nom <span style="color: red">*</span></label>
                                        <input type="text" name="name" id="name" placeholder="Ex: Dupond"
                                               class="form-control" value="{{old('name')}}">
                                    </div>

                                    <div class="md-form">
                                        <i class="fa fa-user prefix grey-text"></i>
                                        <label for="prenom_adh">Prenom <span style="color: red">*</span></label>
                                        <input type="text" name="prenom_adh" id="prenom_adh" placeholder="Ex: Pierre"
                                               class="form-control" value="{{old('prenom_adh')}}">
                                    </div>

                                    <div class="md-form">
                                        <i class="fa fa-user prefix grey-text"></i>
                                        <label for="pseudo_adh">Pseudo <span style="color: red">*</span></label>
                                        <input type="text" name="pseudo_adh" id="pseudo_adh" placeholder="Ex: Passion"
                                               class="form-control" value="{{old('pseudo_adh')}}">
                                    </div>

                                    <div class="md-form">
                                        <i class="fa fa-user prefix grey-text"></i>
                                        <label for="photo_adh">Photo</label>
                                        <input type="file" name="photo_adh" id="photo_adh"
                                               placeholder="Ex: Votre photo/avatar"
                                               class="form-control" value="{{old('photo_adh')}}">
                                    </div>


                                    <div class="md-form">
                                        <i class="fa fa-envelope prefix grey-text"></i>
                                        <label for="email">Email <span style="color: red">*</span></label>
                                        <input type="email" name="email" id="email"
                                               placeholder="Ex: Dupond@free.fr" class="form-control"
                                               value="{{old('email')}}">
                                    </div>

                                    <div class="md-form">
                                        <i class="fa fa-envelope prefix grey-text"></i>
                                        <label for="emailconfirm">Confirmer votre email <span
                                                style="color: red">*</span></label>
                                        <input type="email" name="emailconfirm"
                                               id="emailconfirm"
                                               placeholder="Ex: Dupond@free.fr" class="form-control"
                                               value="{{old('emailconfirm')}}">
                                    </div>

                                    <div class="md-form">
                                        <i class="fa fa-lock prefix grey-text"></i>
                                        <label for="password">Votre mot de passe <span
                                                style="color: red">*</span></label>
                                        <input type="password" name="password"
                                               id="password" placeholder="Ex: *****"
                                               class="form-control" value="{{old('password')}}">
                                    </div>

                                    <div class="md-form">
                                        <i class="fa fa-lock prefix grey-text"></i>
                                        <label for="passwordconfirm">Confirmer votre mot de
                                            passe <span style="color: red">*</span></label>
                                        <input type="password" name="passwordconfirm"
                                               id="passwordconfirm" placeholder="Ex: *****"
                                               class="form-control" value="{{old('passwordconfirm')}}">
                                    </div>

                                    <div class="md-form">
                                        <i class="fa fa-restroom prefix grey-text"></i>
                                        <label for="civilite_id">Votre civilité <span
                                                style="color: red">*</span></label>
                                        <select class="form-control" id="civilite_id" name="civilite_id"
                                                value="{{old('civilite_id')}}">
                                            @foreach($civilites as $civilite)
                                                <option value="{{$civilite->id}}">{{$civilite->civ}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="md-form">
                                        <i class="fa fa-restroom prefix grey-text"></i>
                                        <label for="profil_id">Votre profil <span style="color: red">*</span></label>
                                        <select class="form-control" id="profil_id" name="profil_id"
                                                value="{{old('profil_id')}}">
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
                                                value="{{old('ville_id')}}">
                                                @foreach($villes as $ville)
                                                    <option
                                                        value="{{$ville->id}}">{{ $ville->code_postal_ville_geo . " " . $ville->nom_ville_geo}}</option>
                                                @endforeach
                                        </select>
                                    </div>

                                    <div class="form-check">
                                        <input name="acceptcondition" class="form-check-input" type="checkbox"
                                               id="acceptcondition" value="{{old('acceptcondition')}}">
                                        <label for="acceptcondition" class="grey-text">Accepter <span
                                                style="color: red">*</span>
                                            les
                                            <a href="#"> Termes et Conditions</a>
                                        </label>
                                    </div>

                                    <div class="text-center mt-4">
                                        <button class="btn btn-outline-warning" type="submit" data-toggle="modal"
                                                data-target="#myModal" required>Valider
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
@endsection
