@extends('default')

@section('content')
    <main role="main">
        <div class="container">
            <div class="py-5 text-center">
                <img src="{{asset('img/background/thanks.gif')}}">
                <h2>Merci {{auth()->user()->pseudo_adh}} pour votre donnation pour le site JusteUnRegard !</h2>
            </div>
        </div>
    </main>
@endsection
l
