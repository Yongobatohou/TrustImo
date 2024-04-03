@extends('layouts.base')


@section('base')

    <!-- Navbar Start -->
    <div class="container-fluid nav-bar bg-transparent mb-5">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
            <a href="index.html" class="navbar-brand d-flex align-items-center text-center">
                <div class="icon p-2 me-2">
                    <img class="img-fluid" src="../assets/img/logo_Trust Imo.png" alt="Icon" style="width: 50px; height: 50px;">
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
</div>


<div class="container-lg">
    <div class="col">
        <div class="row">
            <div class="bg-primary rounded text-white position-relative display-7 start-0 top-0 mb-4 w-60 py-3 px-3">En Vente</div>
            <div class="col-lg-8">
                <div id="carouselExampleAutoplaying h-50" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="../assets/img/property-1.jpg" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="../assets/img/property-2.jpg" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="../assets/img/property-3.jpg" class="d-block w-100" alt="...">
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
            </div>
            <div class="col-lg-4 d-flex flex-column justify-content-between">
                <img src="../assets/img/property-4.jpg" class="d-block w-100 h-50 my-2" alt="...">
                <img src="../assets/img/property-5.jpg" class="d-block w-100 h-50 my-2" alt="...">
            </div>
        </div>
        <div class="row my-5">
            <div class="col-lg-8">
                <div class="d-flex justify-content-between">
                    <h2> {{$parcelle->nom}} </h2>
                    <h2> {{number_format($parcelle->price, thousands_separator: ' ')}} fCFA</h2>
                </div>
                <p><i class="fa fa-ruler-combined text-primary me-2"></i> <span class="fw-bold text-dark" style="font-size: 25px;">{{$parcelle->surface}} m²</span>, {{$parcelle->ville}}, {{$parcelle->quartier}}</p>

                <div class="d-flex border-top">

                </div>

                <div class="mt-4">
                    <h4>Description</h4>
                    <p>{{$parcelle->description}}</p>
                </div>
                <div class="mt-5">
                    <h4>Caractéristiques</h4>
                    <div class="d-flex">
                        @foreach ($parcelle->parcelle_options as $option)
                            <p class="btn btn-outline-tertiary px-4">
                                <i class="fa fa-check me-2"></i> {{$option->name}}
                            </p>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card p-3" style="width: 25rem; ">
                    <div class="card-body text-center" style="font-size: 22px">
                      <h5 class="card-title">Prenez Rapidement contact avec l'annonceur.</h5>
                      <p class="card-text">Publié par:</p>
                      <div class="d-flex justify-content-between">
                        <a href="#" class="btn btn-outline-primary"><i class="fa fa-phone-alt me-2"></i>WhatsApp</a>
                        <a href="#" class="btn btn-outline-primary"><i class="fa fa-phone-alt me-2"></i>Appel</a>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

