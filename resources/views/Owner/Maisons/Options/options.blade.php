@extends('layouts/auth')


@section('auth')

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Caractéritiques Enregistrées</h1>
            <a href="{{route('get_add_option')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i>Ajouter une Caractéristique</a>
        </div>

                                        <!-- DataTales Example -->
                                        <div class="card shadow mb-4">
                                            <div class="card-header py-3">
                                                <h6 class="m-0 font-weight-bold text-success">Liste des Caractéritiques Enregistrées</h6>
                                            </div>
                                            <div class="card-body col">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Nom</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tfoot>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Nom</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </tfoot>
                                                        <tbody>

                                                            @foreach ($options as $option)

                                                            <tr>
                                                                <td>{{$option->id}}</td>
                                                                <td>{{$option->name}}</td>
                                                                <td class="d-flex">
                                                                    <a href="{{route('edit_option', ['id' => $option->id])}}" class="d-none m-2 d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i
                                                                        class="fas fa-edit fa-lg text-white-70"></i></a>
                                                                    <a href="{{ route('destroy_option', ['id'=>$option->id]) }}" class="d-none m-2 d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
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

