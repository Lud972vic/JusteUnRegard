@extends('default')

@section('title')
    JusteUnRegard - Donnation
@endsection

@section('content')
    <br>
    <br>
    <br>
    <!-- Page Content -->
    <div class="container">
        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <h3 class="card-header">Don</h3>
                    <div class="card-body">
                        <div class="display-4">5.00€</div>
                        <div class="font-italic">unitaire</div>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Participer à l'évolution du site<br><br></li>
                        <li class="list-group-item">Au frais d'herbegement<br><br></li>

                        <li class="list-group-item">
                            <a href="{{route('paiement', ['$total_a_payer'=>5,'$lib_don'=>'Participer à l\'évolution du site'])}}" class="btn btn-outline-warning">Valider</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <h3 class="card-header">Vente</h3>
                    <div class="card-body">
                        <div class="display-4">10.00€</div>
                        <div class="font-italic">unitaire</div>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Vendez votre matériels entre adhérents<br><br></li>
                        <li class="list-group-item">Et participer au frais d'herbegement et d'évolution du site</li>

                        <li class="list-group-item">
                            <a href="{{route('paiement', ['$total_a_payer'=>10,'$lib_don'=>'Vendez votre matériels entre adhérents'])}}" class="btn btn-outline-warning">Valider</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <h3 class="card-header">Publicité</h3>
                    <div class="card-body">
                        <div class="display-4">15.00€</div>
                        <div class="font-italic">unitaire</div>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Faite de la publicité pour vos clubs photos, salons,
                            expositions...
                        </li>
                        <li class="list-group-item">Et participer au frais d'herbegement et d'évolution du site</li>

                        <li class="list-group-item">
                            <a href="{{route('paiement', ['$total_a_payer'=>15,'$lib_don'=>'Faite de la publicité pour vos clubs photos, salons,
                            expositions...'])}}" class="btn btn-outline-warning">Valider</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->
@endsection
