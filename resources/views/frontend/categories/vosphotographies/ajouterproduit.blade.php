@extends('default')

@section('title')
    JusteUnRegard - Ajouter des accessoires à vendre
@endsection

@section('content')
    <div class="container-fluid espace">
        <div class="col-lg-10 offset-lg-1">
            <div class="row">
                <h1>Ajouter un accessoire</h1>
            </div>
            <div class="card espace"></div>
            <div class="card-body">
                <form action="{{route('update_accessoire')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    @if ($errors->any())
                        <div class="alert-danger">
                            @foreach($errors->all() as $error)
                                <p> {{$error}} </p>
                            @endforeach
                        </div>
                    @endif

                    <div class="md-form">
                        <i class="fa fa-edit"></i>
                        <label for="lib_acc_pub">Libellé de l'accessoire</label>
                        <input type="text" name="lib_acc_pub" id="lib_acc_pub"
                               placeholder="Ex: Un reflex 60D CANON état neuf" class="form-control">
                        <br>
                    </div>

                    <div class="md-form">
                        <i class="fa fa-edit"></i>
                        <label for="desc_acc_pub">Description</label>
                        <textarea name="desc_acc_pub" id="desc_acc_pub" value="" class="form-control" rows="5"
                                  placeholder="Ex: Donner un maximum d'information sur l'accessoire à vendre."></textarea>
                        <br>
                    </div>

                    <div class="md-form">
                        <i class="fa fa-edit"></i>
                        <label for="dt_debut_acc_pub">Date de début</label>
                        <input type="date" name="dt_debut_acc_pub" id="dt_debut_acc_pub" value=""
                               class="form-control"></input>
                        <br>
                    </div>

                    <div class="md-form">
                        <i class="fa fa-edit"></i>
                        <label for="dt_fin_acc_pub">Date de fin</label>
                        <input type="date" name="dt_fin_acc_pub" id="dt_fin_acc_pub" value=""
                               class="form-control"></input>
                        <br>
                    </div>

                    <div class="md-form">
                        <i class="fa fa-edit"></i>
                        <label for="statut_visibilite_acc_pub">Est disponible</label>
                        <input type="checkbox" name="statut_visibilite_acc_pub" id="statut_visibilite_acc_pub" value=""
                               class="form-control"></input>
                        <br>
                    </div>

                    <div class="md-form">
                        <i class="fa fa-edit"></i>
                        <label for="prix">Prix</label>
                        <input type="number" name="prix" id="prix" value=""
                               class="form-control"></input>
                        <br>
                    </div>


                    <div class="form-group row">
                        <label for="url_img_1_acc_pub" class="col-4 col-form-label">Télécharger la photo de l'accessoire</label>
                        <div class="col-8">
                            <div class="input-group">
                                <span class="input-group-btn">
                                     <input class="btn btnMedia btn-outline-success btn-file" type="file" id="url_img_1_acc_pub"
                                            name="url_img_1_acc_pub">
                                </span>
                            </div>
                            <p><strong>Pour information :</strong> La taille de la photo est limitée à 20 Mo.</p>
                            <div class="text-center mt-4">
                                <button class="btn btnMedia btn-outline-success" type="submit" value="Envoyer">
                                    Partager...
                                </button>
                                <a href="{{route('voirmoncompte')}}"
                                   class="btn btnMedia btnMedia btn-outline-warning">Retour</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
