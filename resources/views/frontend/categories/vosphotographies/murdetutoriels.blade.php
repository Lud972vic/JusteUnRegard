@extends('default')
@section('title')
    JusteUnRegard - Accueil - Vos photographies
@endsection

@section('content')
    <!-- Début : Mur de photo-->
    <!--
      - gallery-block, cards-gallery : Voir, le fichier CSS cards-gallery.css
      - container-fluid : La classe container-fluid permet à la grille d'occuper toute la largeur
      - jumbotron : Permet d'afficher un élément graphique que l'on place généralement en x de page, notre titre Mur de photo...
      -->
    <section class="gallery-block cards-gallery">
        <div class="container-fluid">
            <div class="jumbotron text-center">
                <h2>Mur de tutoriels</h2>
                <p>Nos adhérents partagent leurs connaissances à travers de vidéos.</p>
            </div>

            {{$medias->links()}}

            <div class="row no-padding">
                @foreach($medias as $media)
                    <div class="col-lg-4">
                        <div class="card border-0 transform-on-hoverTMP">
                            {{--                            <img src="{{asset($media->url_media)}}" alt="{{$media->lib_media}}"--}}
                            <video width="960" height="480" src="{{asset($media->url_media)}}"
                                   alt="{{$media->lib_media}}" controls class="img-fluid img-thumbnail"></video>
                            <div class="card-body cardBodyNone">
                                <h6 class="card-title text-secondary badge badge-light">
                                    <small><i class="fas fa-user"></i> {{$media->user->pseudo_adh}}</small><br>
                                    <small><i class="fas fa-tag"></i> {{$media->lib_media}}</small><br>
                                    <small><i class="fas fa-camera-retro"></i> {{$media->dt_creation_media}} <i
                                            class="fas fa-folder-open"></i>{{$media->categorie->lib_cat}}
                                    </small></h6>
                                <details class="card-text text-muted">
                                    <summary><small><i class="fas fa-keyboard"></i> {{$media->desc_media}}</small>
                                    </summary>
                                    @foreach($media->commentaire as $c)
                                        @foreach($users as $user)
                                            @if($user->id == $c->user_id)
                                                <br> <small class="badge badge-light">{{$user->pseudo_adh}}
                                                    : {{$c->created_at}} {{$c->lib_comm}}</small>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </details>
                                <div>
                                    <br>
                                    {{--si logué on peut poster de commentaire, sinon on peut juste zommé sur la photographie--}}
                                    <?php if(auth()->guard()->guest()): ?>

                                    <a href="{{asset($media->url_media)}}"
                                       class="btn btn-sm btn-outline-warning"><i class="fas fa-eye"></i>
                                        Zoom</a>


                                    <?php else: ?>
                                    <form
                                        action="{{route('ajoutercommentaire',['media_id'=>$media->id, 'user_id'=>auth()->user()->id])}}"
                                        method="post">
                                        @csrf

                                        @if ($errors->any())
                                            <div class="alert-danger">
                                                @foreach($errors->all() as $error)
                                                    <p> {{$error}} </p>
                                                @endforeach
                                            </div>
                                        @endif

                                        <textarea name="lib_comm" id="lib_comm" cols="60" rows="1"
                                                  placeholder="Qu'avez-vous à dire ?"></textarea>
                                        <a href="{{asset($media->url_media)}}"
                                           class="btn btn-sm btn-outline-warning"><small><i class="fas fa-eye"></i> Zoom</small></a>
                                        <button type="submit" class="btn btn-sm btn-outline-success buttonPaddingLeft">
                                            <i class="fas fa-pencil-alt"></i> Poster
                                        </button>
                                    </form>

                                    <form
                                        action="{{route('bannirmedia',['id'=>$media->id, 'user_id'=>auth()->user()])}}"
                                        method="post">
                                        @csrf

                                        @if ($errors->any())
                                            <div class="alert-danger">
                                                @foreach($errors->all() as $error)
                                                    <p> {{$error}} </p>
                                                @endforeach
                                            </div>
                                        @endif

                                        <button
                                            title="Cliquer sur le bouton Bannir, afin de supprimer une image qui ne respecte pas les règles sur site… Le modérateur sera prévenu et des mesures seront prises. Merci pour votre vigilance."
                                            type="submit" class="btn btn-sm btn-outline-danger buttonPaddingLeft">
                                            <i class="fas fa-ban"></i> Bannir
                                        </button>
                                    </form>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
