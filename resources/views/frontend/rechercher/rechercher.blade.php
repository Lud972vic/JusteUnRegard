@extends('default')

@section('title')
    JusteUnRegard - Moteur de recherche
@endsection

@section('content')
    <div class="container">
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead class="table-light text-center">
                <br>
                <br>
                <h2>Résultats de votre recherche</h2>

                @if($keywords->total()>0)
                    {{$keywords->links()}}
                    <th>Média</th>
                    <th>Libellé</th>
                    <th>Description</th>
                    <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                <h4>Statistiques : </h4>
                <p>Total média de trouvé ({{$keywords->total()}}) <br> Média par page ({{$keywords->perPage()}}) <br>
                    Nombre de page ({{$keywords->lastPage()}})</p>
                @endif

                @if($keywords->total()>0)
                    @foreach($keywords as $keyword)
                        <tr>
                            @if($keyword->type_fichier_media =="image/jpeg")
                                <td><img src="{{asset($keyword->url_media)}}" width="300" class="img-thumbnail"></td>
                            @else
                                <td>
                                    <video width="300" src="{{asset($keyword->url_media)}}"
                                           alt="{{$keyword->lib_media}}"
                                           controls class="img-fluid img-thumbnail"></video>
                                </td>
                            @endif

                            <td>{{$keyword->lib_media}}</td>
                            <td>{{$keyword->desc_media}}</td>
                            <td>
                                <a href="{{$keyword->url_media}}" target="_blank" class="btn btn-sm btn-outline-dark">Voir</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <p style="color: red">Aucun résultat de retourné !</p>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
