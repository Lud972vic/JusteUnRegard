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
    @yield('css')
</head>

<body>
<!--Barre de navigation-->
@include('layouts/partials/_nav')
<!--Contenu-->
@yield('content')
<!--Footer-->
@include('layouts/partials/_footer')
</body>

<!--Scripts-->
@yield('scripts')
</html>
