@extends('default')

@section('content')
    <main role="main">
        <div class="container">
            <div class="py-5 text-center">
                <img src="{{asset('img/background/thanks.gif')}}">
                <h2>Merci {{request('pseudo')}} de vous avoir inscrit sur le site JusteUnRegard </h2>
                <p class="lead">Vous allez recevoir un mail dans les plus brefs délais, pour valider votre
                    inscription.</p>
            </div>
        </div>
    </main>
@endsection
