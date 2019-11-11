@extends('default')
@section('title')
    JusteUnRegard - Accueil - Qui sommes-nous ? - Notre équipe
@endsection

@section('content')
    <!-- Début : Container -->
    <div class="container">

        <!-- Début : Breadcrumb  -->
        <!--
          mt-4
          m -> C'est l'abréviation de "Margin", relative à l'installation de margin des éléments.
          t -> C'est l'abréviation de "Top", relative à l'installation de margin-top ou padding-top.
          4 -> Définit la valeur de margin à 1.5 * $spacer.
          spacer est une valeur définie dans le  SASS de  Bootstrap. Cette valeur est variable selon la largeur différente de l'écran.

          Breadcrumb est un menu de navigation (navigation menu) horizontale. Il perment aux utilisateurs d'imaginer l'emplacement de la page en cours à laquelle ils accèdent.
          Breadcrumb est généralement utilisé dans les website avec un grand nombre de pages avec le contenu hiérarchi, tels que plateforme de partage et de recherche, ...
        -->
        <h1 class="mt-4">Notre équipe</h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-dark" href="{{route('index')}}">Accueil</a></li>
            <li class="breadcrumb-item text-muted">Qui sommes-nous ? - Notre équipe</li>
        </ol>
        <!-- Fin : Breadcrumb  -->

        <!-- Début : Introduction -->
        <div class="row">
            <div class="col-lg-6">
                <img class="img-fluid rounded mb-4" src="{{asset('img/about/groupe.jpg')}}" alt="Notre équipe">
            </div>
            <div class="col-lg-6">
                <h2>JusteUnRegard</h2>
                <p>JusteUnRegard est un média dédié à la photographie</p>
                <p>Vous pourrez retrouver sur ce site des actualités liées au monde de la photo ainsi que des
                    découvertes et des
                    conseils pratiques pour mieux utiliser votre matériel photo.
                </p>
            </div>
        </div>
        <!-- Fin : Introduction -->

        <!-- Début : Notre équipe -->
        <h2>Les membres de l'équipe</h2>
        <div class="row">
            <!--
            - Site avec les explications : https://o7planning.org/fr/11971/tutoriel-bootstrap-card
            - card : est containeur de contenu
            - card-body : partie où on met les différents contenants
            - text-secondary, text-dark et text-muted : couleur des contenus textes
            - card-title, card-subtitle et card-text : les contenus textes
            - h-100 : varie entre 25% et 100% de la hauteur de la card
            -->
            <div class="col-lg-4 mb-4">
                <div class="card h-100 text-center">
                    <img class="card-img-top" src="{{asset('img/about/ludovic.png')}}" alt="Portrait de Ludovic">
                    <div class="card-body">
                        <h4 class="card-title text-dark">Ludovic</h4>
                        <h6 class="card-subtitle mb-2 text-secondary">Développeur</h6>
                        <p class="card-text text-muted">Ludovic est créateur du site JusteUnRegard. Il aime la
                            photographie, le voyage et partage sa passion de la photo sur JusteUnRegard.</p>
                    </div>
                    <div class="card-footer">
            <span title="En cliquant sur le lien du mail, votre messagerie par défaut va s’ouvrir.">
              <a class="text-muted"
                 href="mailto:macomakrel@justeunregard.org?subject=Mail du site Juste Un Regard&body=Bonjour,">ludovic@justeunregard.org</a>
            </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card h-100 text-center">
                    <img class="card-img-top" src="{{asset('img/about/loïc.png')}}" alt="Portrait de Loïc">
                    <div class="card-body">
                        <h4 class="card-title text-dark">Loïc</h4>
                        <h6 class="card-subtitle mb-2 text-secondary">Designer Web</h6>
                        <p class="card-text text-muted">Loïc aime avant tout le design, mais aussi sa passion pour le
                            code.</p>
                    </div>
                    <div class="card-footer">
            <span title="En cliquant sur le lien du mail, votre messagerie par défaut va s’ouvrir.">
              <a class="text-muted"
                 href="mailto:loïc@justeunregard.org?subject=Mail du site Juste Un Regard&body=Bonjour,">loïc@justeunregard.org</a>
            </span>
                    </div>
                </div>
            </div>

        </div>
        <!-- Fin : Notre équipe -->

        <!--Début : Nos clubs -->
        <h2>Les clubs photos partenaires</h2>
        <div class="row">
            <div class="col-lg-2 col-sm-2 mb-2">
                <!--Ouvre le lien extérieur MJC dans un nouvel onglet-->
                <a href="http://mjcmeaux.org/arts-plastiques-et-visuels/photographie-2/" target="_blank">
                    <img class="img-fluid" src="{{asset('img/clubs/mjc.png')}}" alt="Photographie | MJC DE MEAUX">
                </a>
            </div>
            <div class="col-lg-2 col-sm-2 mb-2">
                <img class="img-fluid" src="{{asset('img/clubs/150x50.png')}}" alt="Espace libre pour un nouveau club">
            </div>
        </div>
        <!-- Fin : Nos clubs -->
    </div>
    <!-- Fin : Container -->
@endsection
