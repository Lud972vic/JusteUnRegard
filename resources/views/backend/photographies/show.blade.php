@extends('defaultbackend')

@section('title')
    JusteUnRegard - Gestion des photographies
@endsection

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Gestion des photographies</h1>
        </div>

        <div class="table-responsive">
            {{$medias->links()}}
            <h4>Les photographies activées :</h4>
            <table class="table table-striped table-sm">
                <thead class="table-dark">
                <tr>
                    <th>Photo</th>
                    <th>Crée le</th>
                    <th>Libelle</th>
                    <th>Etat</th>
                    <th>Banni par</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($medias as $media)
                    <tr>
                        <td><img src="{{asset($media->url_media)}}" width="150"
                                 class="img-thumbnail"></td>
                        <td>{{$media->created_at}}</td>
                        <td>{{$media->lib_media}}</td>
                        <td>
                            <select disabled class="form-control" id="bannir_id" name="bannir_id">
                                @foreach($comptes as $compte)
                                    <option
                                        @if($media->bannir == $compte->id) selected
                                        @endif
                                        value="{{$compte->id}}">{{$compte->lib_cpt}}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td>{{$media->banni_par_user}}</td>
                        <td>
                            <a href="{{route('gestiondesphotographiesedit_photo', ['id'=>$media->id, 'compte'=>$compte->id])}}"
                               class="btn btn-outline-primary">Voir/Modifier</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="table-responsive">
            {{$mediasbannis->links()}}
            <h4>Les photographies désactivées :</h4>
            <table class="table table-striped table-sm">
                <thead class="table-dark">
                <tr>
                    <th>Photo</th>
                    <th>Crée le</th>
                    <th>Libelle</th>
                    <th>Etat</th>
                    <th>Banni par</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($mediasbannis as $media)
                    <tr>
                        <td><img src="{{asset($media->url_media)}}" width="150"
                                 class="img-thumbnail"></td>
                        <td>{{$media->created_at}}</td>
                        <td>{{$media->lib_media}}</td>
                        <td>
                            <select disabled class="form-control" id="bannir_id" name="bannir_id">
                                @foreach($comptes as $compte)
                                    <option
                                        @if($media->bannir == $compte->id) selected
                                        @endif
                                        value="{{$compte->id}}">{{$compte->lib_cpt}}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td>{{$media->banni_par_user}}</td>
                        <td>
                            <a href="{{route('gestiondesphotographiesedit_photo', ['id'=>$media->id, 'compte'=>$compte->id])}}"
                               class="btn btn-outline-primary">Voir/Modifier</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection
