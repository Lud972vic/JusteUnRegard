<!-- Bootstrap CSS -->
<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet"/>
<!-- Styles CSS -->
<link href="{{asset('css/jur_styles.css')}}" rel="stylesheet"/>
<!-- Icône du site et du favoris pour l'utilisateur -->
<link rel="icon" type="image/png" href="{{url('img/logo/camera.png')}}"/>
<!-- Gallery CSS -->
<link href="{{asset('css/baguetteBox.min.css')}}" rel="stylesheet"/>
<link href="{{asset('css/cards-gallery.css')}}" rel="stylesheet"/>

<link href="{{asset('css/main.css')}}" rel="stylesheet">

<!-- Navigation -->
<nav id="navbarhaut" class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <a class="navbar-brand" href="{{route('index')}}"> <img src="{{url('./img/logo/camera.ico')}}"
                                                                        alt="Trouvez l’inspiration. Rejoignez la communauté JusteUnRegard, des photos, des tutoriaux, de la bienveillance..."
                                                                        width="30%">
                </a>
            </div>
        </div>

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownQuiSommesNous" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user-friends"></i> Qui sommes-nous ?
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownQuiSommesNous">
                        <a class="dropdown-item" href="{{route('notreequipe')}}" alt=""><i class="fas fa-user"></i>
                            Notre équipe</a>
                        <a class="dropdown-item" href="{{route('nouscontacter')}}" alt=""><i
                                class="fas fa-envelope"></i> Nous
                            contacter</a>
                    </div>
                </li>

                <li>
                    <a class="nav-link" href="{{route('ousetrouventnosadherents')}}" alt="Le menu Se connecter"><i
                            class="fas fa-user-friends"></i> Nos adhérents</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-list"></i> Catégories
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                        <div class="dropdown-header">Vos médias</div>
                        <a class="dropdown-item" href="{{route('murdephotographie')}}" alt="Vos photographies."><i
                                class="far fa-image"></i> Vos photographies</a>
                        <a class="dropdown-item" href="#" alt="Vos tutoriaux."><i class="fas fa-camera"></i>
                            Vos tutoriaux</a>
                        <div class="dropdown-header">Vos matériels</div>
                        <a class="dropdown-item" href="#" alt=""><i class="fas fa-shopping-cart"></i> Vente,
                            Location...</a>
                        <div class="dropdown-header">Vos annonces</div>
                        <a class="dropdown-item" href="#" alt=""><i class="fas fa-bullhorn"></i> Salon,
                            Exposition...</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownQuiSommesNous" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">

                        <i class="fas fa-info-circle"></i> Informations
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownQuiSommesNous">
                        <a class="dropdown-item" href="#" alt="Le menu FAQ"><i class="fas fa-book"></i> Faq</a>
                    </div>
                </li>

            <?php
            //Lien vers "Mon profile", que si l'utilisateur est logué
            if (isset($_SESSION['connect'])) {
                echo('
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMonProfil" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Mon profil
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMonProfil">

                            ');
                echo('<a class="dropdown-item" href="user_profil.php?id_adh=' . urlencode(base64_encode($_SESSION['id_adh'])) . '" alt="Le menu Mes informations">Bienvenue ' . $_SESSION['pseudo_adh'] . ' sur vos paramètres</a>');
                echo('
                                    <a class="dropdown-item" href="#" alt="Le menu Prestation payante ou don">Prestation payante ou don</a>
                                    <a class="dropdown-item" href="#" alt="Le menu Blog">Blog</a>
                                    <a class="dropdown-item" href="#" alt="Le menu Se déconnecter">Se déconnecter</a>
                                    <a class="dropdown-item" href="#" alt="Administration du site">Admin</a>
                                </div>
                            </li>
                        ');
            } else {
                echo('
                            <li class="nav-item">
                                <a class="nav-link" href="seconnecter" alt="Le menu Se connecter"><i class="fas fa-user-lock"></i> Connectez-vous</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="inscription" alt="Le menu S\'inscrire"><i class="fas fa-pencil-alt"></i> S\'inscrire</a>
                            </li>
                        ');
            }
            ?>

            <!--Bouton Recherche
                    ml-auto : place l'ensemble de Input + Bouton à droite du Nav
                    input-group : via un autre div, colle le Bouton Recherche juste à coté du champ Input
                    input-group-append : ajouter derriere le champ Input le bouton Recherche
                -->
                <form class="ml-auto" action="/search.php">
                    <div class="input-group">
                        <input class="form-control" type="search" placeholder="Rechercher" name="search">
                        <div class="input-group-append">
                            <button class="btn btn-warning" type="submit"><span class="fas fa-search"></span></button>
                        </div>
                    </div>
                </form>
            </ul>
        </div>
    </div>
</nav>

<!--Message flash 'info, erreur...' doc : https://github.com/laracasts/flash-->
@include('flash::message')
