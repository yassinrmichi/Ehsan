<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Ehsan</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <link rel="icon" type="image/png" href="{{ asset('img/Ehsan_logo2.png') }}" sizes="16x16">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Inter:slnt,wght@-10..0,100..900&display=swap" rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link rel="stylesheet" href="{{ asset('lib/animate/animate.min.css') }}"/>
        <link href="{{ asset('lib/lightbox/css/lightbox.min.css" rel="stylesheet') }}">
        <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
        <!-- Tailwind CSS via CDN (temporaire pour tests) -->
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">



        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    </head>
    <style>
        .wow.pulse {
    animation: pulse 2s infinite;
}
@keyframes pulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.05); }
    100% { transform: scale(1); }
}
    </style>

    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->



        <!-- Navbar & Hero Start -->
        <div class="container-fluid nav-bar px-0 px-lg-4 py-lg-0">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a href="#" class="navbar-brand p-0">
                        <h1 class="d-flex align-items-center text-primary mb-0" style="gap: 10px;">
                            <img src="{{ asset('img/Ehsan_Logo2.png') }}" alt="Ehsan Logo" style="width: 100px;height: 100px;">
                            {{-- <span style="font-weight: 600;">Ehsan</span> --}}
                          </h1>

                        <!-- <img src="img/logo.png" alt="Logo"> -->
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav mx-0 mx-lg-auto">
                            <a href="{{ route('home') }}" class="nav-item nav-link">Home</a>
                            <a href="{{ route('about') }}" class="nav-item nav-link">About</a>
                            <a href="{{ route('associations.index') }}" class="nav-item nav-link">associations </a>
                            <a href="{{ route('contact') }}" class="nav-item nav-link">Contact</a>
                            @auth
                            @if(auth()->user()->role === 'donateur')
                            <a href="" class="position-relative text-dark" style="margin: 0 35px ">
                                    <i class="fas fa-bell fa-lg"></i>
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        3
                                    </span>
                                </a>

                                <!-- Messages -->
                                <a href="{" class="position-relative text-dark">
                                    <i class="fas fa-envelope fa-lg"></i>
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        2
                                    </span>
                                </a>
                        @elseif(auth()->user()->role === 'association')
                            <a href="" class="nav-item   nav-link font-medium text-gray-700 hover:text-indigo-600 transition ">MyAssociation</a>
                            @elseif(auth()->user()->role === 'admin')
                            <a href="" class="nav-item nav-link font-medium text-gray-700 hover:text-indigo-600 transition w-50">
                                Tableau de bord
                            </a>
                        @endif
                        @endauth


                            <div class="nav-btn px-3">

                                @guest
                                <a href="{{ route('login') }}" class="btn btn-primary rounded-pill py-2 px-4 ms-3 d-flex align-items-center gap-2">
                                    <i class="fas fa-sign-in-alt"></i> Sign In
                                </a>

                            </div>
                            @else

                            <li class="nav-item dropdown ">

                                <a class="nav-link dropdown-toggle h5 d-flex align-items-center rounded-pill py-2 px-4 ms-3 d-flex align-items-center gap-2" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                                    <i class="fas fa-user-circle me-1"></i>{{ Auth::user()->name }}
                                </a>

                                <ul class="dropdown-menu dropdown-menu-end w-100" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                            <i class="fas fa-user-cog me-1"></i> Profil
                                        </a>
                                    </li>
                                    <hr>
                                    <li>
                                        <a class="dropdown-item" href="">
                                            <i class="fas fa-bell fa-lg"></i> Notifications
                                        </a>
                                    </li>
                                    <hr>
                                    <li>
                                        <a class="dropdown-item" href="">
                                            <i class="fas fa-envelope fa-lg"></i> Messages
                                        </a>
                                    </li>
                                    <hr>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button class="dropdown-item" type="submit">
                                                <i class="fas fa-sign-out-alt me-1"></i> Déconnexion
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                        <button class="btn-search btn btn-primary btn-md-square rounded-circle flex-shrink-0" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                    <div class="d-none d-xl-flex flex-shrink-0 ps-4 align-items-center">
                        <!-- Bouton de don animé -->
                        <a href="{{ route('associations.index') }}" class="btn btn-danger btn-lg-square rounded-circle position-relative wow pulse" data-wow-iteration="infinite" data-wow-duration="2s">
                            <i class="fas fa-heart fa-2x"></i>
                            <div class="position-absolute" style="top: 7px; right: 12px;">
                                <span><i class="fas fa-hands-helping text-white"></i></span>
                            </div>
                        </a>

                        <!-- Texte d'accompagnement -->
                        <div class="d-flex flex-column ms-3">
                            <span class="fw-bold text-danger">Faites un don à Ehsan</span>
                            <span class="text-muted small">Votre générosité change des vies</span>
                            <a href="{{ route('associations.index') }}" class="text-decoration-none mt-1">
                                <span class="badge bg-danger bg-opacity-10 text-danger">Soutenir maintenant</span>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar & Hero End -->

        <!-- Modal Search Start -->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen ">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center bg-primary">
                        <div class="input-group w-75 mx-auto d-flex">
                            <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="btn bg-light border nput-group-text p-3"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Search End -->


