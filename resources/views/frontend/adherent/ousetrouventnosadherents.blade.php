@extends('default')

@section('title')
    JusteUnRegard - Vos photographie
@endsection

@section('css')
    <!-- Nous chargeons les fichiers CDN de Leaflet. Le CSS AVANT le JS -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/leaflet.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/MarkerCluster.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/MarkerCluster.css')}}"/>

    <style type="text/css">
        body {
            background-image: url("{{asset('img/background/pin.jpg')}}") !important;
            background-repeat: no-repeat !important;
            background-size: cover !important;
            background-position: center !important;
        }

        #map {
            /* la carte DOIT avoir une hauteur sinon elle n'apparaît pas */
            height: 900px;
            width: auto;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluide">
        <br>
        <br>
        <br>
        <br>
        <br>
        <div id="maptest" class="card border-warning center-div" style="max-width: 95%;">
            <div class="card-body text-warning">
                <h5 class="card-title">Nos adhérents se cache derrière leur appareil photo<img
                        src="{{asset('img/background/instagram.png')}}" height=30></h5>
                <p class="card-text">Renseigner votre code postale dans votre profil, afin d'être visible sur la carte
                    !</p>

                <div id="map" class="center-div">
                    <!-- Ici s'affichera la carte -->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var markers = <?= $marker; ?>;
    </script>

    <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/leaflet.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/leaflet.markercluster.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/leaf.js')}}"></script>


    <script>
        $(document).ready(function () {
            $("#maptest").hide();
            $("#maptest").fadeIn(5000);
        });
    </script>
@endsection
