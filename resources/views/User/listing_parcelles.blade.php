@extends('layouts.base')

@section('title', 'Parcelles')

@section('base')

    <!-- Navbar Start -->
    <div class="container-fluid nav-bar bg-transparent mb-5">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
            <a href="index.html" class="navbar-brand d-flex align-items-center text-center">
                <div class="icon p-2 me-2">
                    <img class="img-fluid" src="../assets/img/logo_Trust Imo.png" alt="Icon" style="width: 85px; height: 90px;">
                </div>
                <h1 class="m-0 text-primary">TrustImo</h1>
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto">
                    <a href="" class="nav-item nav-link"> <i class="fa fa-bell p-1"></i> Notifications</a>
                </div>
                <div class="dropdown" style="margin-left: 20px;">
                    <button class="btn btn-primary px-3 py-2 my-2 d-lg-flex dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-user p-1"></i>Pofil
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Mon Profil</a></li>
                      <li><a class="dropdown-item" href="{{route('logout')}}">Se déconnecter</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

<div class="container-fluid bg-white p-0">
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->



    <!-- Property List Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-0 align-items-center">
                <div class="col-lg- text-start d-flex justify-content-between text-lg-center wow slideInRight" data-wow-delay="0.1s">
                    <a href="" class="rounded-5 px-2 d-lg-flex" ><i class="fa fa-arrow-left"></i></a>
                    <ul class="nav nav-pills d-inline-flex justify-content-center mb-5">
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-primary" href="{{route('properties.listing')}}">Propriétés</a>
                        </li>
                        <li class="nav-item me-0">
                            <a class="btn btn-outline-primary active" href="{{route('parcelles.listing')}}">Parcelles</a>
                        </li>
                    </ul>
                </div>
            </div>



            <div class="tab-content">
                <div id="tab-2" class="tab-pane fade show p-0 active">

                    <!-- Search Start -->
                    <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
                        <div class="container">
                                <form class="row g-2" action="" method="GET">
                                    <div class="col-md-12">
                                        <div class="row g-2">
                                            <div class="col-md-6">
                                                <input type="text" name="ptitle" value="{{$input['ptitle'] ?? ''}}" class="form-control border-0 py-3" placeholder="Mot clé">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="pville" value="{{$input['pville'] ?? ''}}" class="form-control border-0 py-3" placeholder="Ville">
                                            </div>
                                            <div class="col-md-4">
                                                <input type="number" name="pmax" value="{{$input['pmax'] ?? ''}}" class="form-control border-0 py-3" placeholder="Budget Max (f CFA)">
                                            </div>
                                            <div class="col-md-4">
                                                <input type="number" name="psurface" value="{{$input['psurface'] ?? ''}}" class="form-control border-0 py-3" placeholder="Superficie (m²)">
                                            </div>
                                            <div class="col-md-4">
                                                <button type="submit" class="btn btn-dark border-0 w-100 py-3">Rechercher</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                        </div>
                    </div>
                    <!-- Search End -->

                    <div class="row g-4">
                        @forelse ($parcelles as $parcelle)

                            <div class="col-lg-4 col-md-6">
                                <div class="property-item rounded overflow-hidden">
                                    <div class="position-relative overflow-hidden">
                                        <a href="{{route('parcelle.details', [$parcelle, 'slugue' => $parcelle->getSlug()])}}"><img class="img-fluid" src="../assets/img/property-1.jpg" alt=""></a>
                                        <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">En vente</div>
                                    </div>
                                    <div class="p-4 pb-0">
                                        <h5 class="text-primary mb-3">{{number_format($parcelle->price, thousands_separator: ' ')}} fCFA</h5>
                                        <a class="d-block h5 mb-2" href="{{route('parcelle.details', [$parcelle, 'slugue' => $parcelle->getSlug()])}}">{{$parcelle->nom}}</a>
                                        <p><small class="flex-fill text-center fw-bold border-end py-2" style="font-size: 20px;"><i class="fa fa-ruler-combined text-primary me-2"></i>{{$parcelle->surface}} m²</small>  <i class="fa fa-map-marker-alt text-primary me-2"></i>{{$parcelle->ville}}, {{$parcelle->quartier}}</p>

                                    </div>
                                </div>
                            </div>

                        @empty
                            <div class="alert alert-danger" role="alert">
                                Aucune correspondance dans notre base de données!!
                                Contactez notre agence pour avoir le service spéciale Chasseur
                            </div>
                        @endforelse
                        <div class="col-12 text-center">
                            {{$parcelles->links()}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Property List End -->





@endsection


