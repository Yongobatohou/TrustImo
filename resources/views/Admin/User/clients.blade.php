@extends('layouts/auth')


@section('auth')

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Clients</h1>
        </div>

                                        <!-- DataTales Example -->
                                        <div class="card shadow mb-4">
                                            <div class="card-header py-3">
                                                <h6 class="m-0 font-weight-bold text-success">Liste des Clients enregistrés</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Nom et Prénom(s)</th>
                                                                <th>Email</th>
                                                                <th>Téléphone</th>
                                                                <th>Département</th>
                                                                <th>Ville</th>
                                                                <th>Date d'inscription</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tfoot>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Nom et Prénom(s)</th>
                                                                <th>Email</th>
                                                                <th>Téléphone</th>
                                                                <th>Département</th>
                                                                <th>Ville</th>
                                                                <th>Date d'inscription</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </tfoot>
                                                        <tbody>

                                                            @foreach ($clients as $client)

                                                            <tr>
                                                                <td>{{$client->id}}</td>
                                                                <td>{{$client->UserName}}</td>
                                                                <td>{{$client->email}}</td>
                                                                <td>{{$client->tel}}</td>
                                                                <td>{{$client->departement}}</td>
                                                                <td>{{$client->userCity}}</td>
                                                                <td>{{$client->created_at}}</td>
                                                                <td>
                                                                    <a href="{{route('edit_user_profil', ['id' => $client->id])}}" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i
                                                                        class="fas fa-edit fa-lg text-white-70"></i></a>
                                                                    <a href="{{route('delete_user_profil', ['id' => $client->id])}}" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
                                                                            class="fas fa-trash fa-lg text-white-70"></i></a>
                                                                </td>
                                                            </tr>

                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>


                @endsection

