@extends('default')
@section('title')
    JusteUnRegard - Accueil - Qui sommes-nous ? - Nous contacter - Email pour l'administrateur
@endsection

@section('content')
    <h2>Prise de contact à partir du site JusteUnRegard</h2>
    <p>Réception d'une prise de contact avec les éléments suivants :</p>
    <ul>
        <li><strong>Nom de l'internaute</strong> : {{ $nom }}</li>
        <li><strong>Son téléphone</strong> : {{ $phone }}</li>
        <li><strong>Son email</strong> : {{ $email }}</li>
        <li><strong>Son message</strong> : {{ $texte }}</li>
    </ul>
@endsection
