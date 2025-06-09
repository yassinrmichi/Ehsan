@extends('layouts.app')
@section('content')


<style>
    .carousel-img-container {
    position: relative;
    overflow: hidden;
    border-radius: 30px;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
    padding: 10px;

}

.carousel-img-animated {
    width: 100%;
    height: auto;
    animation: floatZoom 6s ease-in-out infinite;
    transition: transform 0.5s ease, box-shadow 0.3s ease;
    border-radius: 20px;
}

.carousel-img-animated:hover {
    transform: scale(1.05);
    box-shadow: 0 25px 60px rgba(0, 0, 0, 0.3);
}

@keyframes floatZoom {
    0% {
        transform: translateY(0px) scale(1);
    }
    50% {
        transform: translateY(-10px) scale(1.02);
    }
    100% {
        transform: translateY(0px) scale(1);
    }
}

</style>
<!-- Carousel Start -->
<div class="header-carousel owl-carousel">

    <!-- Slide 1 - Présentation du projet -->
    <div class="header-carousel-item bg-dark">
        <div class="carousel-caption">
            <div class="container">
                <div class="row g-4 align-items-center">
                    <!-- Texte -->
                    <div class="col-lg-7 animated fadeInLeft">
                        <div class="text-sm-center text-md-start">
                            <h4 class="text-white text-uppercase fw-bold mb-4">Bienvenue sur Ehsan</h4>
                            <h1 class="display-1 text-white mb-4">Faites un geste, changez des vies</h1>
                            <p class="mb-5 fs-5">
                                Ehsan connecte les donateurs aux associations et bénéficiaires dans le besoin. Argent, matériel ou temps, chaque don compte.
                            </p>
                            <div class="d-flex justify-content-center justify-content-md-start flex-shrink-0 mb-4">
                                <a class="btn btn-light rounded-pill py-3 px-4 px-md-5 me-2" href="#">
                                    <i class="fas fa-hand-holding-heart me-2"></i> Faire un don
                                </a>
                                <a class="btn btn-dark rounded-pill py-3 px-4 px-md-5 ms-2" href="#">
                                    Découvrir nos projets
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Image -->
                    <div class="col-lg-5 animated fadeInRight">
                        <div class="carousel-img-container">
                            <img src="{{ asset('img/Donate1.png') }}" alt="Image don" class="img-fluid carousel-img-animated">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Slide 2 - Transparence et impact -->
    <div class="header-carousel-item bg-dark">
        <div class="carousel-caption">
            <div class="container">
                <div class="row gy-4 gy-lg-0 gx-0 gx-lg-5 align-items-center">
                    <!-- Image -->
                    <div class="col-lg-5 animated fadeInLeft">
                        <div class="carousel-img-container">
                            <img src="{{ asset('img/Donate2.png') }}" alt="Image don" class="img-fluid carousel-img-animated">
                        </div>
                    </div>

                    <!-- Texte -->
                    <div class="col-lg-7 animated fadeInRight">
                        <div class="text-sm-center text-md-end">
                            <h4 class="text-white text-uppercase fw-bold mb-4">Suivi transparent</h4>
                            <h1 class="display-1 text-white mb-4">Suivez l'impact de vos dons en temps réel</h1>
                            <p class="mb-5 fs-5">
                                Grâce à notre système automatisé, chaque don est tracé et visible depuis votre tableau de bord personnel.
                            </p>
                            <div class="d-flex justify-content-center justify-content-md-end flex-shrink-0 mb-4">
                                <a class="btn btn-light rounded-pill py-3 px-4 px-md-5 me-2" href="#">
                                    <i class="fas fa-chart-line me-2"></i> Voir mes dons
                                </a>
                                <a class="btn btn-dark rounded-pill py-3 px-4 px-md-5 ms-2" href="#">
                                    Rapports & statistiques
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- Carousel End -->


<!-- Feature Start -->
<div class="container-fluid feature bg-light py-5">
    <div class="container py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Nos Services</h4>
            <h1 class="display-4 mb-4">Ehsan connecte donateurs et associations pour un impact solidaire</h1>
            <p class="mb-0">Notre plateforme facilite la mise en relation entre les donateurs bienveillants et les associations ou bénéficiaires en besoin, en toute transparence et sécurité.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                <div class="feature-item p-4 pt-0">
                    <div class="feature-icon p-4 mb-4">
                        <i class="far fa-handshake fa-3x"></i>
                    </div>
                    <h4 class="mb-4">Confiance & Transparence</h4>
                    <p class="mb-4">Chaque don est suivi, sécurisé, et directement attribué à une cause clairement identifiée.</p>
                    <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Voir plus</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.4s">
                <div class="feature-item p-4 pt-0">
                    <div class="feature-icon p-4 mb-4">
                        <i class="fa fa-chart-line fa-3x"></i>
                    </div>
                    <h4 class="mb-4">Suivi des Dons</h4>
                    <p class="mb-4">Accédez à votre historique, suivez les bénéficiaires et générez des rapports PDF/Excel.</p>
                    <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Voir plus</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.6s">
                <div class="feature-item p-4 pt-0">
                    <div class="feature-icon p-4 mb-4">
                        <i class="fa fa-credit-card fa-3x"></i>
                    </div>
                    <h4 class="mb-4">Paiements Sécurisés</h4>
                    <p class="mb-4">Faites un don en toute sécurité via Stripe ou PayPal avec confirmation par e-mail.</p>
                    <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Voir plus</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.8s">
                <div class="feature-item p-4 pt-0">
                    <div class="feature-icon p-4 mb-4">
                        <i class="fa fa-users fa-3x"></i>
                    </div>
                    <h4 class="mb-4">Réseau d'Associations</h4>
                    <p class="mb-4">Plusieurs associations vérifiées collaborent avec Ehsan pour toucher ceux qui en ont le plus besoin.</p>
                    <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Voir plus</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Feature End -->



@endsection
