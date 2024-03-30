<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TrustImo - Login</title>
    <link rel="icon" type="image/x-icon" href="../assets/img/logo_Trust Imo.png" />

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../assets/css/auth.css" rel="stylesheet">

</head>

<body class="bg-gradient-light">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="card col-6 o-hidden border-0 shadow-lg my-5">

                    <div class="card-header">
                        <h2 class="text-normal text-center">Login</h2>
                    </div>
                    <div class="card-body">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col">
                                    <form class="user" method="POST" action="{{route('admin_login')}}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Entrez votre adresse Email..." name="email" >
                                                @error('email')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Mot de passe" name="password">
                                                @error('password')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Se souvenir de moi</label>
                                            </div>
                                        </div>
                                        <input class="btn btn-success btn-user btn-block" type="submit" value="Se connecter">
                                        <hr>
                                    </form>
                                    <div class="text-center">
                                        <a class="small" href="#">Mot de passe Oublié?</a>
                                    </div>
                            </div>
                        </div>
                    </div>


            </div>

        </div>

    </div>


    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>

</body>

</html>
