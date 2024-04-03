@extends('layouts/auth')


@section('auth')

         <!-- Page Heading -->
         <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Parcelles Enregistrées</h1>
            <a href="{{route('get_add_parcelle')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i>Ajouter une Parcelle</a>
        </div>

                                        <!-- DataTales Example -->
                                        <div class="card shadow mb-4">
                                            <div class="card-header py-3">
                                                <h6 class="m-0 font-weight-bold text-success">Liste des Parcelle enregistrés</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Nom</th>
                                                                <th>Surface</th>
                                                                <th>Prix</th>
                                                                <th>Description</th>
                                                                <th>Ville</th>
                                                                <th>Quartier</th>
                                                                <th>Date d'inscription</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tfoot>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Nom</th>
                                                                <th>Surface</th>
                                                                <th>Prix</th>
                                                                <th>Description</th>
                                                                <th>Ville</th>
                                                                <th>Quartier</th>
                                                                <th>Date d'inscription</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </tfoot>
                                                        <tbody>

                                                            @foreach ($parcelles as $parcelle)

                                                            <tr>
                                                                <td>{{$parcelle->id}}</td>
                                                                <td>{{$parcelle->name}}</td>
                                                                <td>{{$parcelle->surface}}</td>
                                                                <td>{{$parcelle->price}}</td>
                                                                <td>{{$parcelle->description}}</td>
                                                                <td>{{$parcelle->ville}}</td>
                                                                <td>{{$parcelle->quartier}}</td>
                                                                <td>{{$parcelle->created_at}}</td>
                                                                <td>
                                                                    <a href="{{route('edit_parcelle', ['id' => $parcelle->id])}}" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i
                                                                        class="fas fa-edit fa-lg text-white-70"></i></a>
                                                                    <a href="{{route('delete_parcelle', ['id' => $parcelle->id])}}" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
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

