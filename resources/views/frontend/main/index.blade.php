@extends('default')
@section('title')
    JusteUnRegard - Accueil
@endsection


<!-- Début : Vidéo de bienvenue https://pixabay.com/videos/photography-camera-outdoors-vintage-245/ -->
<!--
Pour intégrer une vidéo en responsive sur votre site web, il faut commencer par utiliser une div
principale portant la classe embed-responsive qui englobera votre contenu.
Le 16/9 (seize neuvième) est le format le plus utilisé aujourd’hui sur le web.
La plus part des écrans modernes proposent un affichage sur ce ratio.
-->
<div class="embed-responsive embed-responsive-16by9">
    <video preload="none" poster="{{asset('img/background/background.jpg')}}" controls="true">
        <source src="{{asset('img/background/background.mp4')}}" alt="Un bel appareil photo..." type="video/mp4"/>
    </video>

    <!--
- La propriété content est utilisée afin de générer le contenu d'un élément.
- haut : Voir, le fichier CSS styles.css
- d-none, d-md-block : Pour le smartphone on masquent le h3 et h6. On utilise donc de base la classe d-none pour empêcher l’affichage et la classe d-md-block pour avoir l’affichage à partir des tablettes.
-->
    <div class="content haut d-none d-md-block">
        <h3>Bienvenue sur JusteUnRegard</h3>
        <h6>Ce que l'oeil <i class="fas fa-eye"></i> humain ne perçoit pas, la photographie <i
                class="fas fa-camera"></i> vous le révèlera.</h6>
    </div>

    <!--
- La propriété content est utilisée afin de générer le contenu d'un élément.
- bas : Voir, le fichier styles.css
- d-none, d-md-block : Pour le smartphone on masquent le Bouton Inscription et h6. On utilise donc de base la classe d-none pour empêcher l’affichage et la classe d-md-block pour avoir l’affichage à partir des tablettes.
- row : une ligne avec 12 colonnes, puis on la splite en 2 parties :
- col-md-8, Moyen format ≥ 992 px & < 1200 px ( Petit écran )
- col-md-4, Moyen format ≥ 992 px & < 1200 px ( Petit écran )
- btn btn-...: Bouton avec les effets de la librairie Bootstrap
-->
    <div class="content bas d-none d-md-block">
        <div class="row">
            <div class="col-md-8">
                <h6>Trouvez l’inspiration. Rejoignez la communauté JusteUnRegard, des photos, des tutoriaux, de la
                    bienveillance...</h6>
            </div>
            <div class="col-md-4">
                <?php
                if (!isset($_SESSION['connect'])) {/*On masque les boutons Inscrivez-vous si déjà connecté*/
                    echo('<a class="btn btn-outline-warning" href="register"><i class="fas fa-pencil-alt"></i> Inscrivez-vous, c\'est gratuit</a>');
                }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- Fin : Vidéo de bienvenue https://pixabay.com/videos/photography-camera-outdoors-vintage-245/ -->


<!-- Début : Mur de photo-->
<!--
- gallery-block, cards-gallery : Voir, le fichier CSS cards-gallery.css
- container-fluid : La classe container-fluid permet à la grille d'occuper toute la largeur
- jumbotron : Permet d'afficher un élément graphique que l'on place généralement en haut de page, notre titre Mur de photo...
-->
<section class="gallery-block cards-gallery">
    <div class="container-fluid">
        <div class="jumbotron text-center">
            <h2>Mur de photographie</h2>
            <p>Quelques exemples de photographies de nos adhérents...</p>
        </div>

        <div class="row no-padding">
        @foreach($medias as $media)
            <!--xs 1 image, sm 2 images, md 3 images et lg 6 images-->
                <div class="col-sm-6 col-md-4 col-lg-2">
                    <!--
                - Site avec les explications : https://o7planning.org/fr/11971/tutoriel-bootstrap-card
                - card : est containeur de contenu
                - border-0 : on retire le border
                - transform-on-hover : Voir, le fichier CSS cards-gallery.css
                - card-body cardBodyNone : partie ou on met le texte -> h6, details, summary, a
                - details et summary :
                    L'élément HTML <details> est utilisé comme un outil permettant de révéler une information.Un résumé ou un intitulé peuvent être fournis grâce à un élément <summary>.
                    La plupart du temps, le contrôle utilisé pour cet élément est un triangle qui est tourné ou tordu afin d'indiquer
                    si l'élément est révélé ou non. Si le premier élément fils de l'élément <details> est un élément <summary>,
                    c'est le contenu de ce dernier qui est utilisé comme intitulé pour le contenu à révéler (l'intitulé est donc toujours visible).
                - text-secondary et text-muted : couleur du texte -> titre, auteur & description
                - card-title et card-text : les contenus
                -->
                    <div class="card border-0 transform-on-hover">
                        <img src="{{asset('img'. $media->url_media)}}" alt="Card Image"
                             class="card-img-top imgMurPhoto">
                        <div class="card-body cardBodyNone">
                            <h6 class="card-title text-secondary">{{$media->lib_media}}</h6>
                            <details class="card-text text-muted">
                                <summary>{{$media->pseudo_adh}}</summary>
                                {{$media->desc_media}}
                            </details>
                            <br>
                            <a href="{{asset('img'. $media->url_media)}}"
                               class="btn btn-sm btn-outline-warning"><i class="fas fa-eye"></i> Zoom</a>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Fin : Mur de photo-->


<!-- Début : Une vidéo de tutorial -->
<div class="embed-responsive embed-responsive-16by9">
    <video preload="none" poster="{{asset('/img/adherent/medias/tutorial.jpg')}}" controls="true">
        <source src="{{asset('/img/adherent/medias/tutorial.mp4')}}" alt="Photographie de paysage" type="video/mp4"/>
    </video>
    <div class="content haut d-none d-md-block">
        <h3>Tutorial vidéo</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque eaque delectus architecto aliquid?
            Cumque
            est quos asperiores possimus ipsum provident placeat, dolore ullam, modi pariatur sapiente mollitia qui
            magnam.
        </p>
    </div>
    <div class="content bas d-none d-md-block">
        <h6>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minima eum nulla magnam qui quidem labore
            facere
            saepe sed alias sunt nam, quasi dolores asperiores nobis quos unde vero nihil ab.</h6>
        <br>
    </div>
</div>
<!-- Fin : Une vidéo de tutorial -->


<!-- Début :  Les publicites et les ventes -->
<!--
- espace : Voir, le fichier CSS styles.css
- card* : Voir les commentaires sur la partie "Mur de photo" au -dessus
-->
<div class="container-fluid espace">
    <div class="jumbotron text-center">
        <h2>Ventes de matériels et publicité</h2>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Qui fugiat, fugit perspiciatis officia mollitia
            magni labore tenetur, consequatur reiciendis tempora, blanditiis obcaecati recusandae explicabo.
            Praesentium
            at sed neque ex itaque.</p>
    </div>

    <div class="row">
        <!-- Début : Ventes -->
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-secondary">Ventes</h5>
                    <p class="card-text text-muted">Vendez vos accessoires photographiques entre vous…</p>

                    <!-- Début : Carousel -->
                    <!--
                Première étape, on crée le div qui va contenir notre carrousel.
                - <div id=“option” class=”carousel slide” data-ride=“carousel” >
                - Nous indiquons à bootstrap que nous voulons créer un carrousel avec la classe .caroussel.
                - Nous lui donnons un identifiant id=“option”
                - nous rajoutons l’attribut data-ride=“carousel” pour dire à bootstrap de faire défiler les images (éléments) automatiquement.
                - slide sert à ajouter une animation lors du passage d’un élément à un autre.

                 Deuxième étape, on place le contenu principal du carrousel (dans notre exemple des images).
                - La classe .carousel-inner va contenir tout le contenu principal.
                - Chacune des images est enveloppée dans la classe .carousel-item et on rajoute la classe .active à la première d’entre elles.
                - On place notre image.
                - On rajoute une légende (c’est optionnel bien sûr) avec la classe .carousel-caption.
                -->
                    <div id="carouselIndicatorsVentes" class="carousel slide carousel-fade" data-ride="carousel"
                         data-pause="hover">

                        <div class="carousel-inner">
                            @foreach($accessoires as $accessoire)
                                <div class="carousel-item @if($loop->first) active @endif"
                                     style="background-image: url('{{asset('img'. $accessoire->url_img_1_acc_pub)}}'); height: 400px">
                                    <div class="carousel-caption d-none d-md-block text-white">
                                        <summary class="content bas text-white">
                                            {{$accessoire->lib_acc_pub}}
                                            <details class="text-white">
                                                {{$accessoire->desc_acc_pub}}
                                            </details>
                                        </summary>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Troisiéme et dernière étape, on crée des indicateurs qui se placeront des deux côtés de l’image (ici des flèches)
                    pour revenir manuellement à l’image précédente ou pour avancer vers l’image suivante.
                    On crée des balises de lien <a> dans lesquelles on place notre identifiant href=”#option“
                    On rajoute la classe . carousel-control-prev ou carousel-control-next avec l’attribut data-slide=”prev“ ou
                    data-slide=”next“ pour spécifier vers quelle image la flèche doit nous envoyer.
                    Et enfin on place dans une balise <span> les icônes des indicateurs .carousel-control-prev-icon ou .carousel-control-next-icon
                    -->
                        <!-- Début : Contrôle Précèdent et Suivant-->
                        <a class="carousel-control-prev" href="#carouselIndicatorsVentes" role="button"
                           data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Précèdent</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselIndicatorsVentes" role="button"
                           data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Suivant</span>
                        </a>
                        <!-- Fin : Contrôle Précèdent et Suivant -->
                    </div>
                    <!-- Fin : Carousel -->
                    <br>
                    <a href="#" class="btn btn-outline-warning">Voir l'ensemble des accessoires à vendre</a>
                </div>
            </div>
        </div>
        <!-- Fin : Ventes -->

        <!-- Début : Pub -->
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-secondary">Publicités</h5>
                    <p class="card-text text-muted">Faite de la publicité pour vos clubs photographiques, pour vos
                        salons, vos expositions…</p>

                    <div id="carouselIndicatorsPub" class="carousel slide carousel-fade" data-ride="carousel"
                         data-pause="hover">

                        <div class="carousel-inner">
                            @foreach($publicites as $publicite)
                                <div class="carousel-item @if($loop->first) active @endif"
                                     style="background-image: url('{{asset('img'. $publicite->url_img_1_acc_pub)}}'); height: 400px">
                                    <div class="carousel-caption d-none d-md-block text-white">
                                        <summary class="content bas text-white">
                                            {{$publicite->lib_acc_pub}}
                                            <details class="text-white">
                                                {{$publicite->desc_acc_pub}}
                                            </details>
                                        </summary>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <a class="carousel-control-prev" href="#carouselIndicatorsPub" role="button"
                           data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Précèdent</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselIndicatorsPub" role="button"
                           data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Suivant</span>
                        </a>
                    </div>
                    <br>
                    <a href="#" class="btn btn-outline-warning">Voir l'ensemble des publicités</a>
                </div>
            </div>
        </div>
        <!-- Fin : Pub -->
    </div>
    <!-- Fin :  Les publicites et les ventes -->


    <!--Début :  Bouton Inscription -->
    <hr class="espace">
    <div class="row espace">
        <div class="col-md-8 text-center">
            <p>Trouvez l’inspiration. Rejoignez la communauté JusteUnRegard, des photos, des tutoriaux, de la
                bienveillance...</p>
        </div>
        <div class="col-md-4">
            <?php
            //On masque les boutons Inscrivez-vous si déjà connecté
            if (!isset($_SESSION['connect'])) {
                echo('<a class="btn btn-outline-warning" href="register"><i class="fas fa-pencil-alt"></i> Inscrivez-vous, c\'est gratuit</a>');
            }
            ?>
        </div>
    </div>
    <!--Fin :  Bouton Inscription -->
</div>
