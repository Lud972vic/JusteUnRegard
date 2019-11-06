@extends('default')

@section('content')

    <div class="container">
        <br>
        <div class="row">
            <div class="col-12">
                <h1>Mon compte</h1>
                <p>Vous êtes bien
                    connecté,
                    <strong>{{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->name }}}</strong> !</p>
            </div>

            <!-- Nav pills -->
            <ul class="nav nav-pills" role="tablist">
                <li class="nav-item">
                    <a class="nav-link nav-link_black" id="profile_tab" data-toggle="pill" href="#votre_profile">Mes
                        informations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link_black active" id="images_gestion_tab" data-toggle="pill"
                       href="#gerer_vos_images">Mes images</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link_black" data-toggle="pill" href="#gerer_vos_tutoriaux">Mes tutoriels</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link_black" data-toggle="pill" href="#vendre_un_produit">Mes accessoires à
                        vendre</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link_black" data-toggle="pill" href="#faire_de_la_publicite">Mes publicités
                        en cours</a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Tab panes -->
    <div class="tab-content">
        <div id="votre_profile" class="container tab-pane fade"><br>
            <div class="mask rgba-black-light d-flex justify-content-center align-items-center">
                <div class="container">
                    <div class="row fadeIn">
                        <div class="col col-md-4 white-text text-center text-md-left">
                            <img width="50%" class="img-fluid rounded mb-4" style="border: 1px solid darkgrey"
                                 src="{{asset('img/adherent/avatars/'. $users->photo_adh)}}" alt="{{$users->name}}"
                            >
                        </div>
                        <div class="col col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <form method="post" action="{{route('editermoncompte')}}"
                                          enctype="multipart/form-data"
                                    >
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
                                            <i class="fa fa-restroom prefix grey-text"></i>
                                            <label for="civilite_id">Civilité <span
                                                    style="color: red">*</span></label>
                                            <select class="form-control" id="civilite_id" name="civilite_id">
                                                @foreach($civilites as $code => $civilite)
                                                    <option @if($users->civilite_id == $civilite->id) selected
                                                            @endif value="{{$civilite->id}}">{{$civilite->civ}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="md-form">
                                            <i class="fa fa-user prefix grey-text"></i>
                                            <label for="name">Nom <span style="color: red">*</span></label>
                                            <input type="text" name="name" id="name" placeholder="Ex: Dupond"
                                                   class="form-control" value="{{$users->name ?? old ('name')}}">
                                        </div>

                                        <div class="md-form">
                                            <i class="fa fa-user prefix grey-text"></i>
                                            <label for="prenom_adh">Prenom <span
                                                    style="color: red">*</span></label>
                                            <input type="text" name="prenom_adh" id="prenom_adh"
                                                   placeholder="Ex: Pierre"
                                                   class="form-control"
                                                   value="{{$users->prenom_adh ?? old ('prenom_adh')}}">
                                        </div>

                                        <div class="md-form">
                                            <i class="fa fa-user prefix grey-text"></i>
                                            <label for="pseudo_adh">Pseudo <span
                                                    style="color: red">*</span></label>
                                            <input type="text" name="pseudo_adh" id="pseudo_adh"
                                                   placeholder="Ex: Passion"
                                                   class="form-control"
                                                   value="{{$users->pseudo_adh ?? old ('pseudo_adh')}}">
                                        </div>

                                        <div class="md-form">
                                            <i class="fa fa-envelope prefix grey-text"></i>
                                            <label for="email">Email <span style="color: red">*</span></label>
                                            <input type="email" name="email" id="email"
                                                   placeholder="Ex: Dupond@free.fr" class="form-control"
                                                   value="{{$users->email ?? old ('email')}}">
                                        </div>

                                        <div class="md-form">
                                            <i class="fa fa-envelope prefix grey-text"></i>
                                            <label for="emailconfirm">Confirmer votre email <span
                                                    style="color: red">*</span></label>
                                            <input type="email" name="emailconfirm"
                                                   id="emailconfirm"
                                                   placeholder="Ex: Dupond@free.fr" class="form-control"
                                                   value="{{$users->emailconfirm ?? old ('emailconfirm')}}">
                                        </div>

                                        <div class="md-form">
                                            <i class="fa fa-lock prefix grey-text"></i>
                                            <label for="password">Votre mot de passe <span
                                                    style="color: red">*</span></label>
                                            <input type="password" name="password"
                                                   id="password" placeholder="Ex: *****"
                                                   class="form-control"
                                                   value="{{$users->password ?? old ('password')}}">
                                        </div>

                                        <div class="md-form">
                                            <i class="fa fa-lock prefix grey-text"></i>
                                            <label for="passwordconfirm">Confirmer votre mot de
                                                passe <span style="color: red">*</span></label>
                                            <input type="password" name="passwordconfirm"
                                                   id="passwordconfirm" placeholder="Ex: *****"
                                                   class="form-control"
                                                   value="{{$users->password ?? old ('password')}}">
                                        </div>

                                        <div class="md-form">
                                            <i class="fa fa-user prefix grey-text"></i>
                                            <label for="photo_adh">Photo</label>
                                            <input type="file" name="photo_adh" id="photo_adh"
                                                   placeholder="Ex: Votre photo/avatar"
                                                   class="form-control"
                                                   value="{{$users->photo_adh ?? old ('photo_adh')}}">
                                        </div>

                                        <div class="md-form">
                                            <i class="fa fa-restroom prefix grey-text"></i>
                                            <label for="profil_id">Votre profil <span
                                                    style="color: red">*</span></label>
                                            <select class="form-control" id="profil_id" name="profil_id">
                                                @foreach($profils as $code => $profil)
                                                    <option @if($users->profil_id == $profil->id) selected
                                                            @endif value="{{$profil->id}}">{{$profil->profil}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="md-form">
                                            <i class="fa fa-user prefix grey-text"></i>
                                            <label for="dt_naiss_adh">Date de naissance</label>
                                            <input type="date" name="dt_naiss_adh" id="dt_naiss_adh"
                                                   placeholder="Ex: 25/12/2001"
                                                   class="form-control"
                                                   value="{{$users->dt_naiss_adh ?? old ('dt_naiss_adh')}}">
                                        </div>

                                        <div class="md-form">
                                            <i class="fa fa-user prefix grey-text"></i>
                                            <label for="telephone_adh">Téléphone</label>
                                            <input type="tel" name="telephone_adh" id="telephone_adh"
                                                   placeholder="Ex: +3360102030405"
                                                   class="form-control"
                                                   value="{{$users->telephone_adh ?? old ('telephone_adh')}}">
                                        </div>

                                        <div class="md-form">
                                            <i class="fa fa-user prefix grey-text"></i>
                                            <label for="descrip_adh">Biographie <span
                                                    style="color: red">*</span></label>
                                            <input type="text" name="descrip_adh" id="descrip_adh"
                                                   placeholder="Ex: Parlez nous de vous..."
                                                   class="form-control"
                                                   value="{{$users->pseudo_adh ?? old ('pseudo_adh')}}">
                                        </div>

                                        <div class="md-form">
                                            <i class="fa fa-map-marker-alt prefix grey-text"></i>
                                            <label for="ville_id">Votre département <span
                                                    style="color: red">*</span></label>
                                            <select class="form-control" id="ville_id" name="ville_id">
                                                @foreach($villes as $code => $ville)
                                                    <option @if($users->ville_id == $ville->id) selected
                                                            @endif value="{{$ville->id}}">{{$ville->code_postal_ville_geo . " " . $ville->nom_ville_geo}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="md-form">
                                            <i class="fa fa-user prefix grey-text"></i>
                                            <label for="cpt_instagram">Compte Instagram <span
                                                    style="color: red">*</span></label>
                                            <input type="text" name="cpt_instagram" id="cpt_instagram"
                                                   placeholder="Ex: https://moncompte"
                                                   class="form-control"
                                                   value="{{$users->cpt_instagram ?? old ('cpt_instagram')}}">
                                        </div>

                                        <div class="md-form">
                                            <i class="fa fa-user prefix grey-text"></i>
                                            <label for="cpt_facebook">Compte FaceBook <span
                                                    style="color: red">*</span></label>
                                            <input type="text" name="cpt_facebook" id="cpt_facebook"
                                                   placeholder="Ex: https://moncompte"
                                                   class="form-control"
                                                   value="{{$users->cpt_facebook ?? old ('cpt_facebook')}}">
                                        </div>

                                        <div class="md-form">
                                            <i class="fa fa-user prefix grey-text"></i>
                                            <label for="cpt_rs_autre">Compte Autre <span
                                                    style="color: red">*</span></label>
                                            <input type="text" name="cpt_rs_autre" id="cpt_rs_autre"
                                                   placeholder="Ex: https://moncompte"
                                                   class="form-control"
                                                   value="{{$users->cpt_rs_autre ?? old ('cpt_rs_autre')}}">
                                        </div>

                                        <div class="text-center mt-4">
                                            <a href="{{route('supprimermoncompte',['id'=>auth()->user()->id])}}"
                                               class="btn btn-danger buttonPaddingLeft"
                                               data-toggle="confirmation"
                                               data-btn-ok-label="Supprimer" data-btn-ok-icon="fa fa-remove"
                                               data-btn-ok-class="btn btn-sm btn-danger"
                                               data-btn-cancel-label="Annuler"
                                               data-btn-cancel-icon="fa fa-chevron-circle-left"
                                               data-btn-cancel-class="btn btn-sm btn-success"
                                               data-title="Voulez-vous vraiement supprimer votre compte ?"
                                               data-placement="left" data-singleton="true">Supprimer
                                            </a>
                                        </div>

                                        <div class="text-center mt-4">
                                            <input type="submit" value="Mettre à jour mon profil"
                                                   class="btn btn-outline-success">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="gerer_vos_images" class="container tab-pane active"><br>
            <div class="row">
                <div class="col-9 text-md-right">
                    <p>Ajouter vos photographies, vous avez partagé {{ $mediasImages->total() }} photos.</p>
                </div>
                <div class="col-3 text-md-left">
                    <a href="{{route('index')}}" class="btn btnMedia btn-outline-warning">Sortir</a>
                    <a href="{{route('ajouterphoto')}}" class="btn btnMedia btn-outline-primary">Ajouter</a>
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
                    @foreach($mediasImages as $mediasImage)
                        <tr>
                            <td>
                                <div>
                                    @if($mediasImage->bannir ==2)
                                        Cette photographoe a été bannie, elle sera supprimée dans les 24h.<br>Le
                                        modérateur du site est prévenu.<br><span style="color: red">Vous pouvez la supprimer !</span>
                                    @else
                                        <div>
                                            <img width="200" src="{{asset($mediasImage->url_media)}}"
                                                 alt="{{$mediasImage->nom_media}}" class="img-fluid img-thumbnail">
                                        </div>
                                    @endif
                                </div>
                            </td>
                            <td>
                                @if($mediasImage->bannir ==2)
                                    <a href="{{route('supprimerphoto',['id'=>$mediasImage->id])}}"
                                       class="btn btnMedia btn-outline-danger">Supprimer</a>
                                @else
                                    <a href="{{route('supprimerphoto',['id'=>$mediasImage->id])}}"
                                       class="btn btnMedia btn-outline-danger">Supprimer</a>

                                    <a href="{{route('modifiermedia',['id'=>$mediasImage->id])}}"
                                       class="btn btnMedia btn-outline-primary">Modifier</a>

                                    <a href="{{route('voirphoto',['id'=>$mediasImage->id])}}"
                                       class="btn btnMedia btn-outline-success">Voir</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$mediasImages->links()}}
            </div>
        </div>

        <div id="gerer_vos_tutoriaux" class="container tab-pane fade"><br>
            <div class="row">
                <div class="col-9 text-md-right">
                    <p>Ajouter vos vidéos, vous avez partagé {{ $mediasTutoriaux->total()}} tutoriels.</p>
                </div>
                <div class="col-3 text-md-left">
                    <a href="{{route('index')}}" class="btn btnMedia btn-outline-warning">Sortir</a>
                    <a href="{{route('ajoutervideo')}}" class="btn btnMedia btn-outline-primary">Ajouter</a>
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
                    @foreach($mediasTutoriaux as $mediasTutorial)
                        <tr>
                            <td>
                                <div>
                                    @if($mediasTutorial->bannir ==2)
                                        Cette vidéo a été bannie, elle sera supprimée dans les 24h.<br>Le modérateur du
                                        site est prévenu.<br><span style="color: red">Vous pouvez la supprimer !</span>
                                    @else
                                        <video width="200" src="{{asset($mediasTutorial->url_media)}}"
                                               alt="{{$mediasTutorial->nom_media}}" controls
                                               class="img-fluid img-thumbnail"></video>
                                    @endif
                                </div>
                            </td>
                            <td>
                                @if($mediasTutorial->bannir ==2)
                                    <a href="{{route('supprimerphoto',['id'=>$mediasTutorial->id])}}"
                                       class="btn btnMedia btn-outline-danger">Supprimer</a>
                                @else
                                    <a href="{{route('supprimerphoto',['id'=>$mediasTutorial->id])}}"
                                       class="btn btnMedia btn-outline-danger">Supprimer</a>

                                    <a href="{{route('modifiermedia',['id'=>$mediasTutorial->id])}}"
                                       class="btn btnMedia btn-outline-primary">Modifier</a>

                                    <a href="{{route('voirphoto',['id'=>$mediasTutorial->id])}}"
                                       class="btn btnMedia btn-outline-success">Voir</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$mediasTutoriaux->links()}}
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
    <script src="{{asset('js/userprofile.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-confirmation.min.js')}}"></script>
    <!--Fin : Les Scripts JS-->

    <!--Bouton retour nav-pills-->
    <script>
        var url = document.location.toString();
        if (url.match('#')) {
            $('.nav-pills a[href="#' + url.split('#')[1] + '"]').tab('show');
        }
    </script>

    <!--Bouton supprimer-->
    <script type="text/javascript">
        $(document).ready(function () {
            $('[data-toggle=confirmation]').confirmation({
                rootSelector: '[data-toggle=confirmation]',
                onConfirm: function (event, element) {
                    element.trigger('confirm');
                }
            });
            // $(document).on('confirm', function (e) {
            //     var ele = e.target;
            //     e.preventDefault();
            //     $.ajax({
            //         url: ele.href,
            //         type: 'DELETE',
            //         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            //         success: function (data) {
            //             if (data['success']) {
            //                 $("#" + data['tr']).slideUp("slow");
            //                 alert(data['success']);
            //             } else if (data['error']) {
            //                 alert(data['error']);
            //             } else {
            //                 alert('Whoops Something went wrong!!');
            //             }
            //         },
            //         error: function (data) {
            //             alert(data.responseText);
            //         }
            //     });
            //     return false;
            // });
        });
    </script>
@endsection
