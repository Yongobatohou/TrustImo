<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title> TrustImo - @yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="../assets/img/logo_Trust Imo.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../assets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="../assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar Start -->
    <div class="container-fluid nav-bar bg-transparent mb-5">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
            <a href="{{route('home')}}" class="navbar-brand d-flex align-items-center text-center">
                <div class="icon p-2 me-2">
                    <img class="img-fluid" src="../assets/img/logo_Trust Imo.png" alt="Icon"
                        style="width: 85px; height: 90px;">
                </div>
                <h1 class="m-0 text-primary">TrustImo</h1>
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto">
                </div>
                <div class="dropdown" style="margin-left: 20px;">
                    <button class="btn btn-primary px-3 py-2 my-2 d-lg-flex dropdown-toggle" type="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-user p-1"></i>{{ Auth::user()->UserName }}
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('profil') }}">Mon Profil</a></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Se déconnecter</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    @yield('base')

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 footer pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-6 col-md-6">
                    <h5 class="text-white mb-4">Prenez contact</h5>
                    {{--  <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p> --}}
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <h5 class="text-white mb-1">Laissez nous un message!!</h5>
                    <p>Laissez nous un message pour toutes préocupation, suggestions ou partenariat.</p>
                    <form action="{{ route('contact') }}" method="POST" class="position-relative mx-auto"
                        style="max-width: auto;">
                        @csrf
                        <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text"
                            placeholder="Votre Nom et Prenoms" name="name">
                        <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5 mt-2" type="email"
                            placeholder="Votre Email" name="email">
                        <textarea class="form-control bg-transparent w-100 py-3 ps-4 pe-5 mt-2" name="message" id="message" cols="30"
                            rows="5" placeholder="Laissez votre message ici"></textarea>
                        <button type="submit"
                            class="btn btn-primary py-2 position-relative top-0 end-0 mt-2 me-2">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright ">
                <div class="col-md-12 text-center mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="#">TrustImo</a>, Tous droits réservés.

                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    Designed By <a class="border-bottom" href="">KYGE</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/lib/wow/wow.min.js"></script>
    <script src="../assets/lib/easing/easing.min.js"></script>
    <script src="../assets/lib/waypoints/waypoints.min.js"></script>
    <script src="../assets/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="../assets/js/main.js"></script>
</body>

</html>
