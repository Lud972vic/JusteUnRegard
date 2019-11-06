@extends('default')

@section('title')
    JusteUnRegard - Modifier
@endsection

@section('content')
    <div class="container-fluid espace">
        <div class="col-lg-10 offset-lg-1">
            <div class="row">
                <h1>Modification Média</h1>
            </div>

            <form action="{{route('modifiermedia_confirmation',['id'=>$media->id])}}" method="post"
                  enctype="multipart/form-data">
                @csrf

                @if ($errors->any())
                    <div class="alert-danger">
                        @foreach($errors->all() as $error)
                            <p> {{$error}} </p>
                        @endforeach
                    </div>
                @endif

                <section class="gallery-block cards-gallery espace">
                    <div class="row">
                        <div class="col-lg-10 offset-lg-1">
                            <div>
                                <td>
                                    <div class="card border-0 transform-on-hover">
                                        @if($media->type_fichier_media == 'image/jpeg')
                                            <img width="400" src="{{asset($media->url_media)}}"
                                                 alt="{{$media->nom_media}}"
                                                 class="card-img-top">
                                        @else
                                            <video width="400" src="{{asset($media->url_media)}}"
                                                   alt="{{$media->nom_media}}"
                                                   controls class="card-img-top"></video>
                                        @endif

                                        <div class="card-body text-muted card-text">
                                            <h6 class="card-title text-secondary badge badge-light">
                                                <div class="form-row">
                                                    <label for="lib_media">Libellé du média :</label>
                                                    <input type="text" class="form-control" id="lib_media"
                                                           name="lib_media" value="{{$media->lib_media}}">
                                                </div>
                                                <div class="form-row">
                                                    <label for="categorie_id">Catégorie :</label>
                                                    <select class="form-control" id="categorie_id" name="categorie_id">
                                                        @foreach($categories as $categorie)
                                                            <option
                                                                @if($media->categorie_id == $categorie->id) selected
                                                                @endif value="{{$categorie->id}}">{{$categorie->lib_cat}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-row">
                                                    <label for="desc_media">Description :</label>
                                                    <textarea class="form-control" id="desc_media"
                                                              name="desc_media">{{$media->desc_media}}</textarea>
                                                </div>
                                            </h6>
                                            <br>

                                            <button type="submit" class="btn btnMedia btn-sm btn-outline-success">Mettre
                                                à jour
                                            </button>

                                            <a href="{{route('voirmoncompte')}}"
                                               class="btn btnMedia btn-sm btn-outline-warning">Retour</a>
                                        </div>
                                    </div>
                                </td>
                            </div>
                        </div>
                    </div>
                </section>
            </form>
        </div>
    </div>
@endsection
