@extends('default')

@section('title')
    JusteUnRegard - Zoom
@endsection

@section('content')
    <div class="container-fluid espace">
        <div class="col-lg-10 offset-lg-1">
            <div class="row">
                <h1>Supprimer Média</h1>
            </div>

            <section class="gallery-block cards-gallery espace">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div>
                            <td>
                                <form action="{{route('supprimermedia_confirmation',['id'=>$media->id])}}" method="post">
                                    @csrf

                                    <div class="form-actions">
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
                                                    <small><i class="fas fa-tag"></i> {{$media->lib_media}}</small><br>
                                                    <small><i class="fas fa-user"></i> {{$media->user->pseudo_adh}}
                                                    </small><br>
                                                    <small><i class="fas fa-camera-retro"></i> {{$media->created_at}}
                                                    </small><br>
{{--                                                    <small> <i--}}
{{--                                                            class="fas fa-folder-open"></i>{{$media->typeannonce->lib_type_ann}}--}}
{{--                                                    </small>--}}
                                                </h6>

                                                <br>
                                                <button type="submit"
                                                        class="btn btnMedia btn-sm btn-outline-danger" id="supprimer"
                                                        name="supprimer" value="supprimer">Confirmer la suppression
                                                </button>

                                                <a href="{{route('voirmoncompte')}}"
                                                   class="btn btnMedia btn-sm btn-outline-warning">Retour</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

<!--Début : Les Scripts JS-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/baguettebox/js/baguetteBox.min.js"></script>
<!--Fin : Les Scripts JS-->

<!--Début : Mode carousel quand on clique sur une image-->
<script>
    baguetteBox.run('.cards-gallery', {
        animation: 'slideIn'
    });
</script>
<!--Fin : Mode carousel quand on clique sur une image-->
