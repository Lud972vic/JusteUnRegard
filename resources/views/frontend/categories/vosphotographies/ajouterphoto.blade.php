@extends('default')

@section('title')
    JusteUnRegard - Ajouter des photographies
@endsection

@section('content')
    <div class="container-fluid espace">
        <div class="col-lg-10 offset-lg-1">
            <div class="row">
                <h1>Ajouter une photographie</h1>
            </div>
            <div class="card espace"></div>
            <div class="card-body">
                <form action="{{route('ajouterphoto')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    @if ($errors->any())
                        <div class="alert-danger">
                            @foreach($errors->all() as $error)
                                <p> {{$error}} </p>
                            @endforeach
                        </div>
                    @endif

                    {{--                    <div class="md-form">--}}
                    {{--                        <i class="fa fa fa-image"></i>--}}
                    {{--                        <label for="nom_media">Nom du fichier</label>--}}
                    {{--                        <input disabled type="text" name="nom_media" id="nom_media" value="" class="form-control">--}}
                    {{--                        <br>--}}
                    {{--                    </div>--}}

                    <div class="md-form">
                        <i class="fa fa-edit"></i>
                        <label for="lib_media">Libellé du média</label>
                        <input type="text" name="lib_media" id="lib_media"
                               placeholder="Ex: Une libellule posée sur un rosier" class="form-control">
                        <br>
                    </div>

                    <div class="md-form">
                        <i class="fa fa-edit"></i>
                        <label for="desc_media">Description</label>
                        <textarea name="desc_media" id="desc_media" value="" class="form-control" rows="5"
                                  placeholder="Ex: Dit nous, en quelques mots, ce que cette photo vous a inspiré lors de ma prise de vues. Vous pouvez, nous parler du contexte de celui-ci, le lieu, les techniques utilisés… "></textarea>
                        <br>
                    </div>

                    {{--                    <div class="md-form">--}}
                    {{--                        <i class="fa fa-lock"></i>--}}
                    {{--                        <label for="taille_media">Taille du média</label>--}}
                    {{--                        <input disabled type="text" name="taille_media" id="taille_media" value="" class="form-control">--}}
                    {{--                        <br>--}}
                    {{--                    </div>--}}

                    {{--                    <div class="md-form">--}}
                    {{--                        <i class="fa fa-lock"></i>--}}
                    {{--                        <label for="type_fichier_media">Type de fichier</label>--}}
                    {{--                        <input name="type_fichier_media" id="type_fichier_media" value="" class="form-control">--}}
                    {{--                        <br>--}}
                    {{--                    </div>--}}

                    {{--                    <div class="md-form">--}}
                    {{--                        <i class="fa fa-lock"></i>--}}
                    {{--                        <label for="dure_media">Durée</label>--}}
                    {{--                        <input disabled type="text" name="dure_media" id="dure_media" class="form-control">--}}
                    {{--                        <br>--}}
                    {{--                    </div>--}}

                    <div class="md-form">
                        <i class="fa fa-eye"></i>
                        <label for="categorie_id">Catégorie</label>
                        <select class="form-control" id="categorie_id" name="categorie_id" required>
                            <option value="{{0}}">{{Null}}</option>
                            @foreach( $categories as $categorie)
                                <option value="{{$categorie->id}}">{{$categorie->lib_cat }}</option>
                            @endforeach
                        </select>
                        <br>
                    </div>

                    <div class="form-group row">
                        <label for="url_media" class="col-4 col-form-label">Télécharger votre photographie</label>
                        <div class="col-8">
                            <div class="input-group">
                                <span class="input-group-btn">
                                     <input class="btn btnMedia btn-outline-success btn-file" type="file" id="url_media"
                                            name="url_media">
                                </span>
                            </div>
                            <p><strong>Pour information :</strong> La taille de la photo est limitée à 20 Mo.</p>
                            <div class="text-center mt-4">
                                <button class="btn btnMedia btn-outline-success" type="submit" value="Envoyer">
                                    Partager...
                                </button>
                                <a href="{{route('index')}}"
                                   class="btn btnMedia btnMedia btn-outline-warning">Retour</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
