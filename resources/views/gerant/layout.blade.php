<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>FuelCare-Gerant</title>


    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />





    <style>
        body{
            background: rgb(248,249,250);
        }


        /*
        * Sidebar
        */

        .sidebar {
            position: fixed;
            top: 0;
            /* rtl:raw:
        right: 0;
        */
            bottom: 0;
            /* rtl:remove */
            left: 0;
            z-index: 100;
            /* Behind the navbar */
            padding: 48px 0 0;
            /* Height of navbar */
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
        }

        @media (max-width: 767.98px) {
            .sidebar {
                top: 5rem;
            }
        }

        .sidebar-sticky {
            position: relative;
            top: 0;
            height: calc(100vh - 48px);
            padding-top: .5rem;
            overflow-x: hidden;
            overflow-y: auto;
            /* Scrollable contents if viewport is shorter than content. */
        }

        .sidebar .nav-link {
            font-weight: 500;
            color: #333;
        }

        .sidebar .nav-link .feather {
            margin-right: 4px;
            color: #727272;
        }

        .sidebar .nav-link.active {
            color: #2470dc;
        }

        .btn{
            border-radius: 3px !important;
        }

        .sidebar .nav-link:hover .feather,
        .sidebar .nav-link.active .feather {
            color: inherit;
        }



        .sidebar-heading {
            font-size: .75rem;
            text-transform: uppercase;
        }

        /*
        * Navbar
        */

        .navbar-brand {
            padding-top: .75rem;
            padding-bottom: .75rem;
            font-size: 1rem;
            background-color: rgba(0, 0, 0, .25);
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);
        }

        .navbar .navbar-toggler {
            top: .25rem;
            right: 1rem;
        }

        .navbar .form-control {
            padding: .75rem 1rem;
            border-width: 0;
            border-radius: 0;
        }

        .form-control-dark {
            color: #fff;
            background-color: rgba(255, 255, 255, .1);
            border-color: rgba(255, 255, 255, .1);
        }

        .form-control-dark:focus {
            border-color: transparent;
            box-shadow: 0 0 0 3px rgba(255, 255, 255, .25);
        }

        .fake_img {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background: linear-gradient(60deg,red,blue);
        }

        @media (max-width: 767px) {
            .second-logout{
                display: none;
            }
        }

        .bg-dark{
            background-color: rgb(41,48,66) !important;
            color: #fff

        }

        .bg-dark .nav-link{
            color: rgb(218,221,225);
            font-size: 14px

        }
        .cuve{
            width: 180px;
            height: 200px;
            border: rgba(202, 202, 202, 0.933) 1px solid;
            border-radius: 0px 0px 30% 30%;
            border-top: none;
            overflow: hidden;
            position: relative;

        }
        .niveau{
            position: absolute;
            bottom: 0px;
            width: 100%;
            height: 95%;
            background:linear-gradient(rgb(130, 250, 140),rgb(34, 214, 43))
        }
        .niveau2{
            height: 60%;
            background:linear-gradient(rgb(255, 233, 111),rgb(255, 185, 55))
        }
        .niveau3{

            height: 30%;
            background:linear-gradient(rgb(255, 103, 93),rgb(255, 32, 32))
        }
        .niveauTexte{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            z-index: 2;
            font-weight: 900
        }
    </style>


</head>

<body>

    <header class="navbar shadow-sm navbar-light sticky-top flex-md-nowrap p-0" style="background-color: white ;">
        <a class="navbar-brand bg-dark text-center col-md-3 col-lg-2 me-0 px-3" href="#"><span style="font-size:25px;color:rgb(255, 60, 0);"><i class="fas fa-gas-pump"></i></span><span
                style="font-weight: 500; color:white;">Fluel<span style="color: rgb(255, 60, 0)">Care</span></span></a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav ">
            <div class="nav-item second-logout text-nowrap">
                <a class="nav-link pe-5" href="{{ route('logout') }}">Déconnexion <i class="fa fa-sign-out" aria-hidden="true"></i></a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            @include("gerant.nav")
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @yield("content")
            </main>
        </div>
    </div>


    <script src="{{ asset('js/app.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>
</body>

</html>
