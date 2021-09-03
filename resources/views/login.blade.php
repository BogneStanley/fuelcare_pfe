<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Connexion</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">




    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }



        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #ffffff;
        }

        .form-signin {
            width: 100%;
            max-width: 900px;
            overflow: hidden;

            margin: auto;
            background-color: #ffffff;
            border-radius: 5px;
        }

        .formulaire{
            padding: 80px 60px 80px 60px;
        }

        @media (max-width: 914px) {
            .form-signin {

                margin: 20px;

            }
        }

        @media (max-width: 767px) {
            .form-signin {

                max-width: 350px;

                margin:auto;

            }
        }
        .form-signin .checkbox {
            font-weight: 400;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

    </style>

</head>

<body class="text-center">
    @include("flash-message")

    <main class="row form-signin shadow-lg">

        <form class="col-md-6 formulaire" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="h5 text-start">
                <span style="font-size:18px;color:rgb(255, 60, 0);"><i class="fas fa-gas-pump"></i></span><span style="font-size:16px;">Fuel<span
                    style="color: rgb(255, 60, 0)">Care</span></span>
            </div>
            <br>
            <div class="h5 text-start">
                <span> Bienvenue sur FuelCare! </span><br>
                <span style="font-size:8px;"> Connectez-vous pour accéder à votre espace de travail </span><br>
            </div>
            <hr style="background: rgb(214, 214, 214)">
            <br>
            <div class="form-floating mb-2">
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email</label>
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="floatingPassword"
                    placeholder="Password">
                <label for="floatingPassword">Mot de passe</label>
            </div>


            <button class="w-100 btn btn-lg " style="background: #FF3C00;color:white;" type="submit">Connexion</button>
        </form>
        <div class="col-md-6 ">
            <div class="row align-items-center" style="background: #141922;height: 100%;">
                <div class="h1 py-3">
                    <span style="font-size:35px;color:rgb(255, 60, 0);"><i class="fas fa-gas-pump"></i></span><span style="color: white">Fuel<span
                        style="color: rgb(255, 60, 0)">Care</span></span>
                        <br><br>
                        <div class="px-5" style="font-size:12px;color:rgb(197, 197, 197);">
                            Plus de soucis de gestion au sein de vos stations-service. FUELCARE vous permet de gérer vos stations a distance et en toute simplicité.
                        </div>
                </div>

            </div>
        </div>
    </main>


    <script src="{{ asset('js/app.js') }}"></script>

</body>

</html>
