@extends('layouts/auth')


@section('auth')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        {{--                         <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                @if (Auth::user()->role == 'owner')
                                    Toutes les annonces
                                @else
                                    Total des Utilisateurs
                                @endif
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                @if (Auth::user()->role == 'owner')
                                    {{$annonces}}
                                @else
                                    {{ $users }}
                                @endif
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                @if (Auth::user()->role == 'owner')
                                    Propriétés
                                @else
                                    Utilisateurs (Clients)
                                @endif
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                @if (Auth::user()->role == 'owner')
                                    {{$houses}}
                                @else
                                    {{ $Clients }}
                                @endif

                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                @if (Auth::user()->role == 'owner')
                                    Parcelles
                                @else
                                    Utilisateurs (Pro)
                                @endif
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                        @if (Auth::user()->role == 'owner')
                                            {{$parcelles}}
                                        @else
                                            {{ $owners }}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                @if (Auth::user()->role == 'owner')
                                    Abonnement (j-5)
                                @else
                                    Total des Annonces (Actives)
                                @endif
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                @if (Auth::user()->role == 'owner')
                                    Abonnement
                                @else
                                    {{ $annonces }}
                                @endif
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (Auth::user()->role == 'admin')
        <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Liste des Derniers Utilisateurs enregistrés</h6>
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
                            <th>Ville</th>
                            <th>Type de Compte</th>
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
                            <th>Ville</th>
                            <th>Type de Compte</th>
                            <th>Date d'inscription</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        @foreach ($clients as $client)
                            <tr>
                                <td>{{ $client->id }}</td>
                                <td>{{ $client->UserName }}</td>
                                <td>{{ $client->email }}</td>
                                <td>{{ $client->tel }}</td>
                                <td>{{ $client->userCity }}</td>
                                <td>
                                    @if ($client->role == 'user')
                                        Client
                                    @elseif ($client->role == 'owner')
                                        Annonceur
                                    @else
                                        Administrateur
                                    @endif
                                </td>
                                <td>{{ $client->created_at }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('edit_user_profil', ['id' => $client->id]) }}"
                                        class="mx-3 d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i
                                            class="fas fa-edit fa-lg text-white-70"></i></a>
                                    <a href="{{ route('delete_user_profil', ['id' => $client->id]) }}"
                                        class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
                                            class="fas fa-trash fa-lg text-white-70"></i></a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif

    </div>
    <!-- /.container-fluid -->
@endsection
