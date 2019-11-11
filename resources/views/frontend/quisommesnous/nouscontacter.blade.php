@extends('default')
@section('title')
    JusteUnRegard - Accueil - Qui sommes-nous ? - Nous contacter
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
        <h1 class="mt-4 mb-3">Nous contacter</h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-dark" href="{{route('index')}}">Accueil</a></li>
            <li class="breadcrumb-item text-muted">Qui sommes-nous ? - Nous contacter</li>
        </ol>
        <!-- Fin : Breadcrumb -->

        <div class="row">
            <!-- Début : Carte google -->
            <div class="col-lg-8 mb-4">
                <!-- Embedded Google Map -->
                <!--
                L'élément HTML <iframe> représente un contexte de navigation imbriqué qui permet en fait d'obtenir une page HTML intégrée dans la page courante.
                allowfullscreen : Cet attribut, lorsqu'il vaut true(vrai) indique que l'iframe intégré peut être passé en plein écran via la méthodeElement.requestFullscreen().
                -->

                <div class="embed-responsive embed-responsive-16by9">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d21001.911311425087!2d2.292615!3d48.8536544!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6706c24674b03%3A0x5bd1ab4d00725e13!2sNextformation!5e0!3m2!1sfr!2sfr!4v1562427242106!5m2!1sfr!2sfr"
                        width="600" height="450" style="border:0" allowfullscreen></iframe>
                </div>

            </div>
            <!-- Fin : Carte google -->

            <!-- Début : Notre adresse -->
            <div class="col-lg-4 mb-4">
                <h3>Notre adresse</h3>
                <p>
                    Nextformation
                    <br>
                    Centre de formation
                    <br>
                    6-8 Rue Firmin Gillot, 75015 Paris
                    <br><br>
                    Téléphone : +33 6 59 06 49 00
                </p>
            </div>
            <!-- Fin : Notre adresse -->
        </div>

        <!-- Début : Formulaire de quisommesnous -->
        <div class="row">
            <div class="col-lg-8 mb-4">
                <h3>Envoyer-nous un message</h3>

                {!! Form::open(['url' => 'nouscontacter']) !!}

                <div class="control-group form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">
                    {!! Form::text('nom', null, ['class' => 'form-control', 'placeholder' => 'Veuillez saisir votre nom... Ex: Dupond']) !!}
                    {!! $errors->first('nom', '<small class="help-block">:message</small>') !!}
                </div>

                <div class="control-group form-group {!! $errors->has('phone') ? 'has-error' : '' !!}">
                    {!! Form::tel('phone', null, ['class' => 'form-control', 'placeholder' => 'Veuillez saisir votre numéro de téléphone... Ex: +33 6 59 06 49 00']) !!}
                    {!! $errors->first('phone', '<small class="help-block">:message</small>') !!}
                </div>

                <div class="control-group form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
                    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Veuillez saisir votre email... Ex : pierre.dupond@free.fr']) !!}
                    {!! $errors->first('email', '<small class="help-block">:message</small>') !!}
                </div>

                <div class="control-group form-group {!! $errors->has('texte') ? 'has-error' : '' !!}">
                    {!! Form::textarea('texte', null, ['class' => 'form-control', 'placeholder' => 'Veuillez saisir votre message...']) !!}
                    {!! $errors->first('texte', '<small class="help-block">:message</small>') !!}
                </div>

                {!! Form::submit('Envoyer votre message', ['class' => 'btn btn-outline-warning']) !!}
                {!! Form::close() !!}
            </div>
        </div>
        <!-- Fin : Formulairequisommesnousontact -->
    </div>
    <!-- Fin : Container -->
@endsection
