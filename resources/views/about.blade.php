@extends('layouts.app')
@section('content')
<!-- About Section Start -->
<div class="container py-5">
    <div class="row g-5 align-items-center">
        <!-- Image Section -->
        <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.2s">
            <div class="position-relative">
                <img src="{{ asset('img/about.jpg') }}" class="img-fluid rounded shadow-lg" style="border-radius: 50px;" alt="À propos d'Ehsan">
                <div class="position-absolute top-0 start-0 bg-primary text-white px-3 py-2 rounded-end">
                    Depuis 2024
                </div>
            </div>
        </div>

        <!-- Text Content -->
        <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.4s">
            <h4 class="text-primary">Qui sommes-nous ?</h4>
            <h1 class="mb-4">Bienvenue sur <strong>Ehsan</strong></h1>
            <p class="mb-3 h4">
                <strong>Ehsan</strong> est une plateforme solidaire qui connecte les donateurs, les associations et les bénéficiaires. Notre mission est de faciliter les dons et de soutenir les associations dans leurs actions humanitaires, sociales et culturelles.
            </p>
            <p class="mb-3 h4">
                Grâce à notre technologie, nous permettons aux associations d’être visibles, de recevoir des dons en toute sécurité et de communiquer avec les donateurs de manière transparente.
            </p>
            <p class="mb-4 h4">
                Rejoignez notre communauté et contribuez à faire une réelle différence dans la vie des gens.
            </p>
            <a href="{{ route('associations.index') }}" class="btn btn-primary px-4 py-2">Voir les associations</a>
        </div>
    </div>
</div>
<!-- About Section End -->

@endsection
