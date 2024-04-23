@extends('layouts/auth')


@section('auth')

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Propriétés Enregistrées</h1>
            <a href="{{route('get_add_house')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i>Ajouter une Propriétée</a>
        </div>

                                        <!-- DataTales Example -->
                                        <div class="card shadow mb-4">
                                            <div class="card-header py-3">
                                                <h6 class="m-0 font-weight-bold text-success">Liste des Propriétés Enregistrées</h6>
                                            </div>
                                            <div class="card-body col">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th>Nom</th>
                                                                <th>Type</th>
                                                                <th>Ville</th>
                                                                <th>Prix/Loyé</th>
                                                                <th>Avance</th>
                                                                <th>Pièces</th>
                                                                <th>Chambres</th>
                                                                <th>Date de publication</th>
                                                                <th>Status</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Nom</th>
                                                                <th>Type</th>
                                                                <th>Ville</th>
                                                                <th>Prix/Loyé</th>
                                                                <th>Avance</th>
                                                                <th>Pièces</th>
                                                                <th>Chambres</th>
                                                                <th>Date de publication</th>
                                                                <th>Status</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </tfoot>
                                                        <tbody>

                                                            @if (Auth::user()->role == 'owner')
                                                                @foreach ($users as $user)

                                                                <tr class="col-12">
                                                                    <td>{{$user->name}}</td>
                                                                    <td>{{$user->type}}</td>
                                                                    <td>{{$user->ville}}</td>
                                                                    <td>{{$user->loyé}}</td>
                                                                    <td>{{$user->avance}}</td>
                                                                    <td>{{$user->rooms}}</td>
                                                                    <td>{{$user->bedrooms}}</td>
                                                                    <td>{{$user->created_at}}</td>
                                                                    <td>{{$user->status}}</td>
                                                                    <td class="d-flex">
                                                                        <a href="{{route('edit_house', ['id' => $user->id])}}" class="d-none m-2 d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i
                                                                            class="fas fa-edit fa-lg text-white-70"></i></a>
                                                                        <a href="{{route('delete_house', ['id' => $user->id])}}" class="d-none m-2 d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
                                                                                class="fas fa-trash fa-lg text-white-70"></i></a>
                                                                    </td>
                                                                </tr>

                                                                @endforeach
                                                            @else
                                                                @foreach ($maisons as $maison)

                                                                <tr class="col-12">
                                                                    <td>{{$maison->name}}</td>
                                                                    <td>{{$maison->type}}</td>
                                                                    <td>{{$maison->ville}}</td>
                                                                    <td>{{$maison->loyé}}</td>
                                                                    <td>{{$maison->avance}}</td>
                                                                    <td>{{$maison->rooms}}</td>
                                                                    <td>{{$maison->bedrooms}}</td>
                                                                    <td>{{$maison->created_at}}</td>
                                                                    <td>{{$maison->status}}</td>
                                                                    <td class="d-flex">
                                                                        <a href="{{route('edit_house', $maison)}}" class="d-none m-2 d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i
                                                                            class="fas fa-edit fa-lg text-white-70"></i></a>
                                                                        <a href="{{route('delete_house', $maison)}}" class="d-none m-2 d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
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

