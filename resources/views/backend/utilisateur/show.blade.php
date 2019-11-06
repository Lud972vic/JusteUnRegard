@extends('defaultbackend')

@section('title')
    JusteUnRegard - Gestion des utilisateurs
@endsection

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Gestion des utilisateurs</h1>
        </div>

        <div class="table-responsive">
            {{$utilisateurs->links()}}
            <h4>Les comptes activés :</h4>
            <table class="table table-striped table-sm">
                <thead class="table-dark">
                <tr>
                    <th>Avatar</th>
                    <th>Crée le</th>
                    <th>Pseudo</th>
                    <th>Email</th>
                    <th>Etat</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($utilisateurs as $utilisateur)
                    <tr>
                        <td><img src="{{asset('img/adherent/avatars/'.$utilisateur->photo_adh)}}" width="50"
                                 class="img-thumbnail"></td>
                        <td>{{$utilisateur->created_at}}</td>
                        <td>{{$utilisateur->pseudo_adh}}</td>
                        <td>{{$utilisateur->email}}</td>
                        <td>
                            <select disabled class="form-control" id="categorie_id" name="categorie_id">
                                @foreach($comptes as $compte)
                                    <option
                                        @if($utilisateur->compte_id == $compte->id) selected
                                        @endif
                                        value="{{$compte->id}}">{{$compte->lib_cpt}}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <a href="{{route('gestiondesutilisateursedit_user', ['id'=>$utilisateur->id, 'compte'=>$compte->id])}}"
                               class="btn btn-outline-primary">Voir/Modifier</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="table-responsive">
            {{$utilisateursbannis->links()}}
            <h4>Les comptes désactivés :</h4>
            <table class="table table-striped table-sm">
                <thead class="table-dark">
                <tr>
                    <th>Avatar</th>
                    <th>Crée le</th>
                    <th>Pseudo</th>
                    <th>Email</th>
                    <th>Etat</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <form action="" method="post">
                    @foreach($utilisateursbannis as $utilisateur)
                        <tr>
                            <td><img src="{{asset('img/adherent/avatars/'.$utilisateur->photo_adh)}}" width="50"
                                     class="img-thumbnail"></td>
                            <td>{{$utilisateur->created_at}}</td>
                            <td>{{$utilisateur->pseudo_adh}}</td>
                            <td>{{$utilisateur->email}}</td>
                            <td>
                                <select disabled class="form-control" id="categorie_id" name="categorie_id">
                                    @foreach($comptes as $compte)
                                        <option
                                            @if($utilisateur->compte_id == $compte->id) selected
                                            @endif value="{{$compte->id}}">{{$compte->lib_cpt}}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <a href="{{route('gestiondesutilisateursedit_user', ['id'=>$utilisateur->id, 'compte'=>$compte->id])}}"
                                   class="btn btn-outline-primary">Voir/Modifier</a>
                            </td>
                        </tr>
                    @endforeach
                </form>
                </tbody>
            </table>
        </div>
    </main>
@endsection
