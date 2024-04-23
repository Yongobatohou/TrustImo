@extends('layouts.base')

@section('title', 'Propriété')

@section('base')



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
        <div class="bg-primary rounded text-white position-relative display-7 start-0 top-0 m-4 py-3 px-3">En {{$property->type}}</div>
        <div class="row">

            <div class="col-lg-8">
                <div id="carouselExampleAutoplaying h-50" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($pictures as $picture)
                            @if ($picture->house_id == $property->id)
                                <div class="carousel-item active">
                                    <img src="../storage/{{$picture->path}}" class="d-block w-100" alt="..." width="1950" height="500">
                                </div>
                            @endif
                        @endforeach
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
            <div class="col-lg-9">
                <div class="d-flex justify-content-between">
                    <h2> {{$property->name}} </h2>
                    <h2> {{number_format($property->loyé, thousands_separator: ' ')}} fCFA</h2>
                </div>
                <p> {{$property->ville}}, {{$property->quartier}} </p>
                <div class="d-flex border-top display-6">
                    <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i>{{$property->surface}} m²</small>
                    <small class="flex-fill text-center py-2"><i class="fa fa-box text-primary me-2"></i>{{$property->rooms}} Pièce(s)</small>
                    <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i>{{$property->bedrooms}} Chambre(s)</small>
                </div>
                <div class="mt-4">
                    <h4>Description</h4>
                    <p>{{$property->description}}</p>
                </div>
                <div class="mt-5">
                    <h4>Caractéristiques</h4>
                    <div class="d-flex">
                        @foreach ($property->house_options as $option)
                            <p class="btn btn-outline-tertiary px-4">
                                <i class="fa fa-check me-2"></i> {{$option->name}}
                            </p>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-body text-center">
                      <h5 class="card-title">Prenez Rapidement contact avec l'annonceur.</h5>
                      <p class="card-text">Publié par: <strong class="display-7">{{$owner->UserName}}</strong></p>
                      <div class="d-flex justify-content-between">
                        <a href="https://wa.me/229{{$owner->tel}}" target="blank" class="btn btn-primary"><i class="fa fa-phone-alt me-2"></i>WhatsApp</a>
                        <a href="tel:{{$owner->tel}}" class="btn btn-primary"><i class="fa fa-phone-alt me-2"></i>Appel</a>
                      </div>
                    </div>
                </div>

                <div class="card mt-4" style="width: 18rem;">
                    <div class="card-header bg-success text-white text-center fw-bold">
                        Politique de TrustImo
                    </div>
                    <div class="card-body">
                      <ul>
                        <li style="list-style:circle;">
                            TrustImo n'est jamais impliqué dans aucune transaction, et ne contribue en aucun paiement, livraison, garantie, transaction, fraude, ou n'offre aucune "protection à l'acheteur" ou "certification de vendeur".
                        </li>
                        <li style="list-style:circle;">
                            L’Entreprise n'est en aucun cas responsable des conséquences qui pourraient en découler.
                        </li>
                        <li style="list-style:circle;">
                            Les informations publiées sur le Site sont non-contractuelles et fournies à titre informatif, gratuit, et sans aucune obligation de la part de L’Entreprise
                        </li>
                      </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

