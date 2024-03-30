@extends('layouts/auth')


@section('auth')

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Agences immobilières et Démarcheurs</h1>
            <a href="{{route('get_add_owner')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-plus fa-sm text-white-50"></i> Ajouter</a>
        </div>

                                        <!-- DataTales Example -->
                                        <div class="card shadow overflow-hidden mb-4">
                                            <div class="card-header py-3">
                                                <h6 class="m-0 font-weight-bold text-success">Liste des Agences Immobilières ou Démarcheurs enregistrés</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Nom</th>
                                                                <th>Email</th>
                                                                <th>Téléphone</th>
                                                                <th>Département</th>
                                                                <th>Ville</th>
                                                                <th>Status</th>
                                                                <th>Date d'inscription</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tfoot>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Nom</th>
                                                                <th>Email</th>
                                                                <th>Téléphone</th>
                                                                <th>Département</th>
                                                                <th>Ville</th>
                                                                <th>Status</th>
                                                                <th>Date d'inscription</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </tfoot>
                                                        <tbody>

                                                            @foreach ($owners as $owner)

                                                            <tr>
                                                                <td>{{$owner->id}}</td>
                                                                <td>{{$owner->OwnerName}}</td>
                                                                <td>{{$owner->email}}</td>
                                                                <td>{{$owner->tel}}</td>
                                                                <td>{{$owner->departement}}</td>
                                                                <td>{{$owner->OwnerCity}}</td>
                                                                <td>{{$owner->status}}</td>
                                                                <td>{{$owner->created_at}}</td>
                                                                <td>
                                                                    <a href="{{route('edit_owner_profil', ['id' => $owner->id])}}" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i
                                                                        class="fas fa-edit fa-lg text-white-70"></i></a>
                                                                    <a href="{{route('delete_owner_profil', ['id' => $owner->id])}}" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
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

