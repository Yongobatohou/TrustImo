@extends('layouts.base')

@section('title', 'Pro')

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
                    <a href="{{route('get_owner_login')}}" class="nav-item nav-link">Connexion</a>
                </div>
                <a href="{{route('get_register')}}" class="btn btn-primary px-3 py-2 d-none d-lg-flex">Incription</a>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

        <!-- Mashead header-->
        <header class="masthead">
            <div class="container px-3">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-7">
                        <!-- Mashead text and app badges-->
                        <div class="mb-5 mb-lg-0 text-center text-lg-start">
                            <h4 class="display-4 fw-normal text-dark lh-1 mb-3">Le portail qui vous redonne le pouvoir</h4>
                            <h5 class="display-7 lead fw-normal text-muted mb-5">Gagnez en visibilité et crédibilité grâce aux annonces certifiées envoyées en temps réel à notre million d'utilisateurs.</h5>
                            <div class="d-flex flex-column flex-lg-row align-items-center">
                                <a class="btn btn-outline-primary py-3 px-4 rounded-3" href="#" target="_blank">Essayez Gratuitement!!!</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <!-- Masthead device mockup feature-->
                        <div class="masthead-device-mockup fadeInDown wow">
                            <img src="../assets/img/Screen-app-agence.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Quote/testimonial aside-->
        <aside class="text-center bg-gradient-primary-to-success py-5">
            <div class="container px-5 my-5 rounded-4 shadow-lg bg-light">
                <div class="row mb-5"></div>
                <div class="row gx-2 justify-content-center rounded-8 shadow-lg mb-5">
                    <div class="col-xl-8 mt-5">
                        <div class="h5 fs-2 p-2 fw-normal text-dark mb-4">Diffusion en illimité d'annonces pour toucher le maximum de contact!</div>
                    </div>
                </div>

                <div class="row gx-1">
                    <div class="col-md-4 mb-5 p-4">
                        <!-- Feature item-->
                        <div class="text-center fadeOut wow">
                            <img class="mb-3" src="../assets/img/icons/Icon-stat-01.png" alt="">
                            <h3 class="font-alt">Device Mockups</h3>
                            <p class="text-muted mb-0">Agences Clientes</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5 p-4">
                        <!-- Feature item-->
                        <div class="text-center fadeOut wow">
                            <img class="mb-3" src="../assets/img/icons/Icon-stat-02.png" alt="">
                            <h3 class="font-alt">Flexible Use</h3>
                            <p class="text-muted mb-0">Utilisateurs</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5 p-4">
                        <!-- Feature item-->
                        <div class="text-center fadeOut wow">
                            <img class="mb-3" src="../assets/img/icons/Icon-stat-03.png" alt="">
                            <h3 class="font-alt">Flexible Use</h3>
                            <p class="text-muted mb-0">Contacts par mois</p>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
        <!-- App features section 1-->
        <section id="features">
            <div class="container">
                <div class="gx-5 align-items-center">
                    <div class="col-lg-12 order-lg-1 mb-5 mb-lg-0">
                        <div class="container-fluid">
                            <div class="row gx-2 text-center justify-content-center m-0">
                                <div class="col-xl-8 mt-5">
                                    <div class="h5 fs-2 p-2 fw-normal text-dark mb-4">Le portail PRO de notre plateforme vous permet de doubler le nombre de contact touché par vos annonces!</div>
                                </div>
                            </div>
                            <div class="row gx-1 fadeInLeft wow">
                                <div class="col-md-4 mb-5">
                                    <!-- Feature item-->
                                    <div class="text-center">
                                        <div class="text-center">
                                            <img src="../assets/img/icons/pro_illus_01.svg" alt="">
                                            <h3 class="font-alt">Visibilité</h3>
                                        </div>
                                        <div class="text-justify">

                                            <p class="text-muted mb-0 d-flex"><i class="bi-check icon-md text-gradient"></i>Vos annonces en tête de liste</p>
                                            <p class="text-muted mb-0 d-flex"><i class="bi-check icon-md text-gradient"></i>Fiche annonce Personnalisée</p>
                                            <p class="text-muted mb-0 d-flex"><i class="bi-check icon-md text-gradient"></i>Relaie de vos annonces sur nos différents canneaux</p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-5">
                                    <!-- Feature item-->
                                    <div class="text-center">
                                        <div class="text-center">
                                            <img src="../assets/img/icons/pro_illus_02.svg" alt="">
                                            <h3 class="font-alt">Réactivité</h3>
                                        </div>
                                        <div class="text-center">

                                            <p class="text-muted mb-0 d-flex"><i class="bi-check icon-md text-gradient"></i>Publications et mise à jour en temps réel</p>
                                            <p class="text-muted mb-0 d-flex"><i class="bi-check icon-md text-gradient"></i>Notification instantané aà tous nos contacts; vs potentiel clients.</p>
                                            <p class="text-muted mb-0 d-flex"><i class="bi-check icon-md text-gradient"></i>Support et assistance Technique dédié?</p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-5">
                                    <!-- Feature item-->
                                    <div class="text-center">
                                        <div class="text-center">
                                            <img src="../assets/img/icons/pro_illus_03.svg" alt="">
                                            <h3 class="font-alt">Qualité</h3>
                                        </div>
                                        <div class="text-center">

                                            <p class="text-muted mb-0 d-flex"><i class="bi-check icon-md text-gradient"></i>Certification de vos annonces</p>
                                            <p class="text-muted mb-0 d-flex"><i class="bi-check icon-md text-gradient"></i>Message direct à vos contacts</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex my-5 mt-5 align-items-center justify-content-center">
                        <a class="btn btn-primary py-3 px-4 rounded-3" href="#" target="_blank">Essayez Gratuitement!!!</a>
                    </div>
                </div>
            </div>
        </section>
         <!-- App features section 2-->
         <section id="features" class="bg-light">
            <div class="container">
                <div class="gx-5 align-items-center">
                    <div class="col-lg-12 order-lg-1 mb-5 mb-lg-0">
                        <div class="container-fluid">
                            <div class="row gx-2 text-center justify-content-center m-0">
                                <div class="col-xl-8">
                                    <div class="h5 fs-2 p-2 fw-normal text-gradient-s mb-4">Comment ça marche ???</div>
                                </div>
                            </div>
                            <div class="row gx-1">
                                <div class="col-md-6 mb-5">
                                    <!-- Feature item-->
                                    <div class="text-center fadeInLeft wow">
                                        <div class="text-center">
                                            <img src="../assets/img/icons/Number-01.svg" alt="" class="mb-3">
                                            <p class="text-muted mb-0">Création de votre compte professionnel et mise en place de votre interface de gestion des annonces.</p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-5">
                                    <!-- Feature item-->
                                    <div class="text-center fadeInRight wow">
                                        <div class="text-center">
                                            <img class="mb-3" src="../assets/img/icons/Number-02.svg" alt="">
                                            <p class="text-muted mb-0">Envoie de vos annonces par notification aux utilisateurs en temps réel.</p>
                                            <p class="text-muted mb-0"><img src="../assets/img/icons/how_02.png" alt=""></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-5 text-center">
                                    <!-- Feature item-->
                                    <div class="text-center fadeInUp wow">
                                        <div class="text-center">
                                            <img class="mb-3" src="../assets/img/icons/Number-03.svg" alt="">
                                            <p class="text-muted mb-0">Gestion de toutes vos annonces sur votre compte TrustImo Pro</p>
                                        </div>
                                        <div class="text-center">
                                            <img src="../assets/img/immobilbiers.png" alt="" class="img-center shadow-lg mt-5 rounded-4">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex my-5 mt-5 align-items-center justify-content-center">
                        <a class="fadeInOut wow btn btn-primary py-3 px-4 rounded-3" href="#" target="_blank">Essayez Gratuitement!!!</a>
                    </div>
                </div>
            </div>
        </section>



        @endsection

