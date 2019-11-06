<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
          content="Bienvenue sur JusteUnRegard - Site de photographie - Ce que l'oeil humain ne perçoit pas, la photographie vous le révèlera.">
    <meta name="author" content="Ludovic">

    <title>@yield('title')</title>

    <!--CSS-->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/jur_styles_backend.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    <!-- Icône du site et du favoris pour l'utilisateur -->
    <link rel="icon" type="image/png" href="{{url('img/logo/camera.png')}}"/>
</head>

<body>
<!--Contenu-->
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Administration</a>
    <a class="nav-link text-white" href="{{route('index')}}">Revenir sur le Frontend</a>
    <a class="nav-link text-white" href="{{route('deconnectermoncompte')}}">Se déconnecter</a>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li>
                        <!--Message flash 'info, erreur...' doc : https://github.com/laracasts/flash-->
                        @include('flash::message')
                    </li>
                    <div>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('gestiondesutilisateursshow_users')}}">
                                <span data-feather="file"></span>
                                <span style="color: red">Gestions des utilisateurs</span>
                            </a>
                        </li>
                    </div>
                    <div>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('gestiondesphotographiesshow_photos')}}">
                                <span data-feather="shopping-cart"></span>
                                <span style="color: orange">Gestions des photographies</span>
                            </a>
                        </li>
                    </div>
                    <div>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('gestiondestutorielsshow_tutoriels')}}">
                                <span data-feather="users"></span>
                                <span style="color: green ">Gestions des tutoriels</span>
                            </a>
                        </li>
                    </div>

                </ul>
            </div>
        </nav>
        @yield('content')
    </div>
</div>

<!--Footer-->
@include('layouts/partials/_footer')
</body>

<!--Scripts-->
@yield('scripts')
</html>
