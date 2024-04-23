@extends('layouts/auth')


@section('auth')

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
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
                                                                <th>Ville</th>
                                                                <th>Quartier</th>
                                                                <th>Date d'enregistrement</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </tfoot>
                                                        <tbody>

                                                          @if (Auth::user()->role == 'owner')
                                                            @foreach ($users as $user)

                                                            <tr>
                                                                <td>{{$user->id}}</td>
                                                                <td>{{$user->name}}</td>
                                                                <td>{{$user->surface}}</td>
                                                                <td>{{$user->price}}</td>
                                                                <td>{{$user->ville}}</td>
                                                                <td>{{$user->quartier}}</td>
                                                                <td>{{$user->created_at}}</td>
                                                                <td class="d-flex">
                                                                    <a href="{{route('edit_parcelle', ['id' => $user->id])}}" class="d-none m-2 d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i
                                                                        class="fas fa-edit fa-lg text-white-70"></i></a>
                                                                    <a href="{{route('delete_parcelle', ['id' => $user->id])}}" class="d-none m-2 d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
                                                                            class="fas fa-trash fa-lg text-white-70"></i></a>
                                                                </td>
                                                            </tr>

                                                            @endforeach
                                                          @else
                                                            @foreach ($parcelles as $parcelle)

                                                            <tr>
                                                                <td>{{$parcelle->id}}</td>
                                                                <td>{{$parcelle->name}}</td>
                                                                <td>{{$parcelle->surface}}</td>
                                                                <td>{{$parcelle->price}}</td>
                                                                <td>{{$parcelle->ville}}</td>
                                                                <td>{{$parcelle->quartier}}</td>
                                                                <td>{{$parcelle->created_at}}</td>
                                                                <td class="d-flex">
                                                                    <a href="{{route('edit_parcelle', $parcelle)}}" class="d-none m-2 d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i
                                                                        class="fas fa-edit fa-lg text-white-70"></i></a>
                                                                    <a href="{{route('delete_parcelle', $parcelle)}}" class="d-none m-2 d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
                                                                            class="fas fa-trash fa-lg text-white-70"></i></a>
                                                                </td>
                                                            </tr>

                                                            @endforeach
                                                          @endif

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>


                @endsection

