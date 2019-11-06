@extends('defaultbackend')

@section('title')
    JusteUnRegard - Gestion des tutoriels
@endsection

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Modifier l'état du tutoriel ({{$media->lib_media}})</h1>
        </div>

        <form action="" method="post">
            @csrf

            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="category_id">Etat</label>
                    <select class="form-control form-control-sm" id="bannir_id" name="bannir_id">
                        @foreach($compte as $c)
                            <option
                                @if($media->bannir == $c->id) selected @endif
                            value="{{$c->id}}">{{$c->lib_cpt}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <button type="submit" class="btn btn-outline-primary">Valider</button>
                    <a href="{{route('gestiondesutilisateursshow_users')}}" class="btn btn-outline-secondary">Annuler</a>
                </div>
            </div>
        </form>
    </main>
@endsection
