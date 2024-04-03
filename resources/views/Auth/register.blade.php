<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TrustImo - Register</title>
    <link rel="icon" type="image/x-icon" href="../assets/img/logo_Trust Imo.png" />

    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-light">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Créer un Compte!</h1>
                            </div>
                            <form class="user" method="POST" action="{{route('register')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                        <input type="text" name="UserName" class="form-control" id="exampleFirstName"
                                            placeholder="Nom d'utilisateur">
                                            @error('UserName')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail"
                                        placeholder="Adresse Email">
                                        @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="departement">Département</label>
                                    <select class="form-control" name="departement" id="departement">
                                        <option value="" selected>Choisissez votre departement actuelle...</option>
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
                                <div class="form-group">
                                    <label class="control-label" for="userCity">Ville</label>
                                    <select class="form-control" name="userCity" id="userCity">
                                        <option value="">Choisissez votre ville actuelle ...</option>
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
                                <div class="form-group">
                                    <label class="control-label" for="tel">Numero de téléphone</label>
                                    <input class="form-control" type="text" name="tel" id="tel">
                                    @error('tel')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control"
                                            id="exampleInputPassword" name="password" placeholder="Mot de passe">
                                            @error('password')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control"
                                            id="exampleRepeatPassword" name="password_confirmation" placeholder="Confirmer mot de passe">
                                    </div>
                                </div>
                                <input class="btn btn-success btn-user btn-block" type="submit" value="S'inscrire">
                            </form>
                            <hr>
                                <a href="# " class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> S'inscrire avec mon Compte Google
                                </a>
                                <a href="#" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> S'inscrire avec mon Compte Facebook
                                </a>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="login.html">Vous avez déjà un compte? Se connecter!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>

</body>

</html>
