@extends('layouts.auth')

@section('title', 'Profil')

@php
    $user = Auth::user();
@endphp

@section('auth')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="container-fluid py-5">


        <main id="main" class="main">

            <div class="pagetitle">
            <h1>Profil</h1>
            </div><!-- End Page Title -->

            <section class="section profile">
            <div class="row">
                <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <i class="fa fa-user p-1 rounded-circle"></i>
                    <h4>{{Auth::user()->UserName}}</h4>
                    <h6>
                        @if (Auth::user()->role == 'user')
                            Client
                        @elseif (Auth::user()->role == 'owner')
                            Annonceur
                        @else
                            Administrateur
                        @endif
                    </h6>
                    </div>
                </div>

                </div>

                <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                    <!-- Bordered Tabs -->
                    <ul class="nav nav-tabs nav-tabs-bordered">

                        <li class="nav-item">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Information de Profil</button>
                        </li>

                        <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Modifier Profil</button>
                        </li>

                        <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Changer mot de passe</button>
                        </li>

                    </ul>
                    <div class="tab-content pt-2">

                        <div class="tab-pane fade show active profile-overview" id="profile-overview">

                        <h5 class="card-title">Détails du Profil</h5>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label ">Nom et Prenoms</div>
                            <div class="col-lg-9 col-md-8">{{Auth::user()->UserName}}</div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">Département</div>
                            <div class="col-lg-9 col-md-8">{{Auth::user()->departement}}</div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">Ville</div>
                            <div class="col-lg-9 col-md-8">{{Auth::user()->userCity}}</div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">Numero Whathsapp</div>
                            <div class="col-lg-9 col-md-8">(+229) {{Auth::user()->tel}}</div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">Email</div>
                            <div class="col-lg-9 col-md-8">{{Auth::user()->email}}</div>
                        </div>

                        </div>

                        <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                        <!-- Profile Edit Form -->
                        <form method="POST" action="{{ route('updated_user', ['id' => $user->id]) }}"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="row mb-3">
                            <label for="UserName" class="col-md-4 col-lg-3 col-form-label">Nom et Prenoms</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="UserName" type="text" class="form-control" id="UserName" value="{{Auth::user()->UserName}}">
                                @error('UserName')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            </div>

                            <div class="row mb-3">
                            <label for="departement" class="col-md-4 col-lg-3 col-form-label">Département</label>
                            <div class="col-md-8 col-lg-9">
                                <select class="form-control" name="departement" id="departement">
                                    <option value="{{ $user->departement }}" selected>{{ $user->departement }}</option>
                                    <option value="ATACORA">ATACORA</option>
                                    <option value="DONGA">DONGA</option>
                                    <option value="BORGOU">BORGOU</option>
                                    <option value="ALIBORI">ALIBORI</option>
                                    <option value="ZOU">ZOU</option>
                                    <option value="COLLINE">COLLINE</option>
                                    <option value="OUÉMÉ">OUÉMÉ</option>
                                    <option value="MONO">MONO</option>
                                    <option value="COUFFO">COUFFO</option>
                                    <option value="PLATEAU">PLATEAU</option>
                                    <option value="ATLANTIQUE">ATLANTIQUE</option>
                                    <option value="LITORALE">LITORALE</option>
                                </select>
                                @error('departement')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            </div>

                            <div class="row mb-3">
                            <label for="userCity" class="col-md-4 col-lg-3 col-form-label">Ville</label>
                            <div class="col-md-8 col-lg-9">
                                <select class="form-control" name="userCity" id="userCity">
                                    <option value="{{ $user->userCity }}">{{ $user->userCity }}</option>
                                    <option value="Natitingou">Natitingou</option>
                                    <option value="Parakou">Parakou</option>
                                    <option value="Tanguiéta">Tanguiéta</option>
                                    <option value="Kandi">Kandi</option>
                                    <option value="N'Dali">N'Dali</option>
                                    <option value="Perma">Perma</option>
                                </select>
                                @error('userCity')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            </div>

                            <div class="row mb-3">
                            <label for="tel" class="col-md-4 col-lg-3 col-form-label">Numero Whathsapp</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="tel" type="text" class="form-control" id="tel" value="{{Auth::user()->tel}}">
                                @error('tel')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            </div>

                            <div class="row mb-3">
                            <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="email" type="email" class="form-control" id="Email" value="{{Auth::user()->email}}">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            </div>

                            <div class="text-center">
                            <button type="submit" class="btn btn-primary">Sauvegarder</button>
                            </div>
                        </form><!-- End Profile Edit Form -->

                        </div>


                        <div class="tab-pane fade pt-3" id="profile-change-password">
                        <!-- Change Password Form -->
                        <form method="POST" action="{{ route('update_pass', ['id' => $user->id]) }}"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="row mb-3">
                            <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Mot de passe actuel</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="cpassword" type="password" class="form-control" id="currentPassword">
                            </div>
                            </div>

                            <div class="row mb-3">
                            <label for="Password" class="col-md-4 col-lg-3 col-form-label">Nouveau Mot de passe</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="password" type="password" class="form-control" id="Password">
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            </div>

                            <div class="row mb-3">
                            <label for="Password_confirmation" class="col-md-4 col-lg-3 col-form-label">Confirmez votre nouveau mot de passe</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="password_confirmation" type="password" class="form-control" id="Password_confirmation">
                            </div>
                            </div>

                            <div class="text-center">
                            <button type="submit" class="btn btn-primary">Changer mot de passe</button>
                            </div>
                        </form><!-- End Change Password Form -->

                        </div>

                    </div><!-- End Bordered Tabs -->

                    </div>
                </div>

                </div>
            </div>
            </section>



        </main><!-- End #main -->


    </div>
    <!-- Property List End -->

@endsection
