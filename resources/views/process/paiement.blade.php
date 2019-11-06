@extends('default')

@section('title')
    JusteUnRegard - Paiement
@endsection

@section('content')
    <main role="main">
        <div class="container">
            <div class="py-5 text-center">
                <i class="fab fa-4x fa-cc-visa"></i>
                <i class="fab fa-4x fa-cc-mastercard"></i>
                <h2>Paiement par Chèque ou Carte Bancaire</h2>
                <h4 class="mt-5">Total à régler: {{number_format(request('donnation'),2)}} € TTC</h4>
                <h4 class="mt-5">Libellé: {{(request('libelle'))}}</h4>
            </div>

            <div class="row">
                <div class="col-md-12 order-md-1">
                    <button disabled class="btn btn-warning btn-lg btn-block" type="submit"> Bientôt : Accéder au
                        paiement sécurisé
                    </button>
                    <p class="text-center">Paiement via <a href="https://stripe.com/fr" target="_blank">Stripe</a> à
                        venir.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 order-md-1">
                    <a href="{{route('paiement_confirmation',['donnation'=>request('donnation'), 'libelle'=>request('libelle')])}}"
                       class="btn btn-primary btn-lg btn-block mt-2" type="submit">Effectuer
                        un paiement par chèque
                    </a>
                </div>
            </div>
        </div>
    </main>
@endsection
