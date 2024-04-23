@extends('layouts.base')

@section('title', 'Propriétés')

@section('base')



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
                            <a class="btn btn-outline-primary active" href="{{route('properties.listing')}}">Propriétés</a>
                        </li>
                        <li class="nav-item me-0">
                            <a class="btn btn-outline-primary" href="{{route('parcelles.listing')}}">Parcelles</a>
                        </li>
                    </ul>
                </div>
            </div>



            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">

                    <!-- Search Start -->
                    <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
                        <div class="container">
                                <form class="row g-2" action="" method="GET">
                                    <div class="col-md-10">
                                        <div class="row g-2">
                                            <div class="col-md-4">
                                                <input type="text" value="{{$input['title'] ?? ''}}" name="title" class="form-control border-0 py-3" placeholder="Mot clé">
                                            </div>
                                            <div class="col-md-4">
                                                <input type="number" value="{{$input['price'] ?? ''}}" name="price" class="form-control border-0 py-3" placeholder="Budget Max (f CFA)">
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" value="{{$input['city'] ?? ''}}" name="city" class="form-control border-0 py-3" placeholder="Ville">
                                            </div>
                                            <div class="col-md-4">
                                                <input type="number" value="{{$input['surface'] ?? ''}}" name="surface" class="form-control border-0 py-3" placeholder="Superficie minimun (m²)">
                                            </div>
                                            <div class="col-md-4">
                                                <select name="type" class="form-select border-0 py-3">
                                                    <option selected value="{{$input['type'] ?? ''}}">{{$input['type'] ?? 'Type de Propriété'}}</option>
                                                    <option value="1">Property Type 1</option>
                                                    <option value="2">Property Type 2</option>
                                                    <option value="3">Property Type 3</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <select name="operation" class="form-select border-0 py-3">
                                                    <option selected value="{{$input['operation'] ?? ''}}">{{$input['operation'] ?? 'Location/Vente'}}</option>
                                                    <option value="Location">Location</option>
                                                    <option value="Vente">Vente</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-dark border-0 w-100 py-3">Rechercher</button>
                                    </div>
                                </form>
                        </div>
                    </div>
                    <!-- Search End -->

                    <div class="row g-4">
                        @forelse ($properties as $property)

                            <div class="col-lg-4 col-md-6">
                                <div class="property-item rounded overflow-hidden">
                                    <div class="position-relative overflow-hidden">
                                        <a href="{{route('properties.details', [$property, 'slug' => $property->getSlug()])}}"><img class="img-fluid" src="../storage/{{$property->image}}" alt=""></a>
                                        <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">{{$property->type}}</div>
                                        <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">{{$property->name}}</div>
                                    </div>
                                    <div class="p-4 pb-0">
                                        <h5 class="text-primary mb-3">{{number_format($property->loyé, thousands_separator: ' ')}} fCFA</h5>
                                        <a class="d-block h5 mb-2" href="{{route('properties.details',[$property, 'slug' => $property->getSlug()])}}">{{$property->name}}</a>
                                        <p><i class="fa fa-map-marker-alt text-primary me-2"></i>{{$property->ville}}, {{$property->quartier}}</p>
                                    </div>
                                    <div class="d-flex border-top">
                                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i>{{$property->surface}} m²</small>
                                        <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i>{{$property->rooms}} Pièce(s)</small>
                                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i>{{$property->bedrooms}} Chambre(s)</small>
                                    </div>
                                </div>
                            </div>

                        @empty
                            <div class="alert alert-warning text-center" role="alert">
                                Aucune correspondance dans notre base de données!!
                                Contactez notre agence pour avoir le service spéciale Chasseur
                            </div>
                        @endforelse
                        <div class="col-12 text-center">
                            {{$properties->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Property List End -->





@endsection


