@extends('layouts.base')

@section('title', 'Home')

@section('base')

    <!-- Navbar Start -->
    <div class="container-fluid nav-bar bg-transparent mb-5">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
            <a href="index.html" class="navbar-brand d-flex align-items-center text-center">
                <div class="icon p-2">
                    <img class="img-fluid" src="../assets/img/logo_Trust Imo.png" alt="Icon" style="width: 85px; height: 90px;">
                </div>
                <h1 class="m-0 text-primary">TrustImo</h1>
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto">
                    <a href="{{route('get_login')}}" class="nav-item nav-link">Connexion</a>
                    <a href="{{route('get_register')}}" class="nav-item nav-link">Inscription</a>
                </div>
                <a href="{{route('pro')}}" class="btn btn-primary px-3 py-2 my-2 d-lg-flex"><span class="d-flex align-items-center">
                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg" class="sc-bdVaJa hSjaWj"><path d="M4 18.5L12.5 12.5L4 6.5V18.5ZM13 6.5V18.5L21.5 12.5L13 6.5Z" fill="white"></path></svg>
                    <span class="small px-2">Faire diffuser vos annonces!!!</span>
                </span></a>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

        <!-- Mashead header-->
        <header class="masthead">
            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6">
                        <!-- Mashead text and app badges-->
                        <div class="mb-5 mb-lg-0 text-center text-lg-start">
                            <h1 class="display-1 lh-1 mb-3"><span class="text-primary">1 app</span>, des miliers d'annonces immobilières</h1>
                            <p class="lead fw-normal text-muted mb-5">Soyez parmi les premiers à recevoir les annonces immobiliers de tous le nord sur une seule et unique application.</p>
                            <div class="d-flex flex-column flex-lg-row align-items-center">
                                <a class="btn btn-outline-primary py-3 px-4 rounded-pill" href="#" target="_blank">Téléchargez TrustImo dès maintenant!!!</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 fadeInRight wow" data-wow-delay="0.5s">
                        <!-- Masthead device mockup feature-->
                        <div class="masthead-device-mockup">
                            <img src="../assets/img/Screen-app.webp" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Quote/testimonial aside-->
        <aside class="text-center bg-gradient-primary-to-secondary py-3">
            <div class="container px-5">
                <div class="row gx-2 justify-content-center">
                    <div class="col-xl-8 mt-5">
                        <div class="h2 fs-1 text-dark mb-4 mt-5">Des milliers d’utilisateurs satisfaits <br>
                            + de 3000 avis</div>
                    </div>
                </div>
            </div>
        </aside>

        <header class="masthead">
            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6 fadeInLeft wow">
                        <!-- Masthead device mockup feature-->
                        <div class="masthead-device-mockup">
                            <img src="../assets/img/home-illus-01.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <!-- Mashead text and app badges-->
                        <div class="mb-5 mb-lg-0 text-center text-lg-start">
                            <p class="lead fw-normal text-muted mb-1" style="color: #7545a1 !important;">Notifications en temps réel </p>
                            <h4 class="display-5 fw-normal lh-1 mb-3">Soyez le premier alerté.</h4>
                            <hr style="border-color:#f2c110; max-width:100px; margin: 40px 0;">
                            <p class="lead fw-normal text-muted mb-5">Recevez les annonces en temps réel par e-mail ou via notre application pour être le premier à postuler. Magique !</p>
                            <div class="d-flex flex-column flex-lg-row align-items-center ">
                                <a class="nav-link btn btn-primary p-3" href="#">Télécherger l'application</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <!-- Start Last Pub section-->
            <div class="tab-content container-lg mt-5">
                <div id="tab-1" class=" mt-5 tab-pane fade show p-0 active">
                    <h2 class="display-5 text-center">Nos dernières annonces</h2>
                    <div class="mt-5 row g-4">

                        @foreach ($properties as $property)

                        <div class="col-lg-4 col-md-6">
                            <div class="property-item rounded overflow-hidden">
                                <div class="position-relative overflow-hidden">
                                    <a href="{{route('properties.details', [$property, 'slug' => $property->getSlug()])}}"><img class="img-fluid" src="../assets/img/property-1.jpg" alt=""></a>
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


                        @endforeach

                        @foreach ($parcelles as $parcelle)

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

                        @endforeach

                        <div class="col-12 text-center wow fadeOut" data-wow-delay="0.1s">
                            <a class="btn btn-primary my-5 py-3 px-5" href="{{route('properties.listing')}}">  Voir Plus de Propriétés</a>
                        </div>
                    </div>
                </div>
            </div>
        <!-- End Last Pub section-->
        <section class="bg-light">
            <div class="container px-5">
                <div class="row gx-5 align-items-center justify-content-center justify-content-lg-between">
                    <div class="col-12 col-lg-5">
                        <h2 class="display-4 lh-1 mb-4">Toutes les annonces immobilières
                            <br>
                            + 100 agences référencées</h2>
                        <p class="lead fw-normal text-muted mb-5 mb-lg-0">Nous cherchons pour vous sur plus d'une centaine d'annonces pour que vous ne loupiez pas l'annonce de vos rêves.</p>
                        <div class="d-flex flex-column flex-lg-row align-items-center mt-3">
                            <a class="nav-link btn btn-primary p-3" href="#">Télécherger l'application</a>
                        </div>
                        <div class="align-items-center mt-4 p-3" style="background-color: #befad9; border: solid 1px #befad9; border-radius:10px; width:450px;">
                            <p  style="font-size:23px;">Agent immobilier ou Propriétaire ???</p>
                            <a class="text-success" href="#" style="text-decoration:underlined; font-size:23px;">Diffuser vos annonces sur TrustImo</a>
                        </div>
                    </div>
                    <div class="col-sm-8 col-md-6 fadeInUp wow">
                        <div class="px-5 px-sm-0"><img class="img-fluid rounded-circle" src="../assets/img/home-illus-04.svg" alt="..." /></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Call to action section-->
        <section class="cta pt-5 bg-white mt-5">
            <div class="cta-content pb-5 mt-5">
                <div class="container px-2">
                    <h2 class="text-dark display-1 lh-1 mb-4">
                        N'hésitez plus !!!
                    </h2>
                    <a class="btn btn-outline-primary py-3 px-4 rounded-pill" href="https://startbootstrap.com/theme/new-age" target="_blank">Téléchargez gratuitement TrustImo</a>
                </div>
            </div>
        </section>


    @endsection






