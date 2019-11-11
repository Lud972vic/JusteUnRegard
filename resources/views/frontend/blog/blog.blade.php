@extends('default')

@section('title')
    JusteUnRegard - Vos photographie
@endsection

@section('content')
    <!-- Début : Container -->
    <div class="container-fluid">
        <div class="row">
            <!-- Post Content Column -->
            <div class="col-lg-12">
                <!-- Preview Image -->
                <img class="img-fluid rounded" src="./img/utilisateurs/groupe.jpg" alt="">
                <hr>

                <!-- Date/Time -->
                <p>Discuter entre vous !</p>
                <hr>

                <!-- Post Content -->
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut,
                    error
                    quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae
                    laborum minus
                    inventore?</p>
                <hr>

                <!-- Comments Form -->
                <div class="col-lg-12">
                    <h5 class="card-header">Participer</h5>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <textarea class="form-control" rows="2" placeholder="Saisser un message..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-sm btn-outline-warning">Envoyer</button>
                            <br>
                        </form>
                    </div>
                </div>

                <!-- Single Comment -->
                <div class="card my-4">
                    <h5 class="card-header">Historique de conversation</h5>
                    <div class="card-body">
                        <div class="form-group" style="height: 500px; overflow: scroll;">
                            <table class="table table-striped table-sm">
                                <thead>
                                <tr>
                                    <th>Avatar</th>
                                    <th>Crée le</th>
                                    <th>Message</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($messages as $tchat)
                                    <tr>
                                        <td width=15%><img src="{{asset('img/adherent/avatars/'. $tchat->user->photo_adh)}}"
                                                 alt="{{$tchat->pseudo_adh}}" width="25"
                                                 class="rounded-circle"> <small>{{$tchat->user->pseudo_adh}}</small>
                                        </td>
                                        <td width=10%><small>{{$tchat->created_at}}</small></td>
                                        <td><small>{{$tchat->msg_tchat}}</small></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin : Container -->
@endsection
