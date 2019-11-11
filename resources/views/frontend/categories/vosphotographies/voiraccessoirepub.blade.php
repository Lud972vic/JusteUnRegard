@extends('default')

@section('title')
    JusteUnRegard - Accessoire Publicité
@endsection

@section('content')
    <div class="container-fluid espace">
        <div class="col-lg-10 offset-lg-1">
            <div class="row">
                <h1>Zoom Accessoire</h1>
            </div>

            <section class="gallery-block cards-gallery espace">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div>
                            <td>
                                <div class="card border-0 transform-on-hover">

                                    <img width="400" src="{{asset($accessoirepub->url_img_1_acc_pub)}}"
                                         alt="{{$accessoirepub->lib_acc_pub}}"
                                         class="card-img-top">

                                    <div class="card-body text-muted card-text">
                                        <h6 class="card-title text-secondary badge badge-light">
                                            <small><i class="fas fa-tag"></i> {{$accessoirepub->lib_acc_pub}}
                                            </small><br>
                                            <small><i class="fas fa-user"></i> {{$accessoirepub->user->pseudo_adh}}
                                            </small><br>
                                            <small><i class="far fa-calendar-alt"></i> {{$accessoirepub->created_at}}
                                            </small><br>
                                            <small> <i
                                                    class="fas fa-folder-open"></i>{{$accessoirepub->typeannonce->lib_type_ann}}
                                            </small>
                                            <small> <i class="fas fa-euro-sign"></i>{{$accessoirepub->prix}}
                                            </small>
                                        </h6>

                                        <br>
                                        <a href="{{asset($accessoirepub->url_img_1_acc_pub)}}"
                                           class="btn btnMedia btn-sm btn-outline-success">Taille originale</a>

                                        <a href="{{route('voirmoncompte')}}"
                                           class="btn btnMedia btn-sm btn-outline-warning">Retour</a>
                                    </div>
                                </div>
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
