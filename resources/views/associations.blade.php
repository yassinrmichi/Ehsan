@extends('layouts.app')
@section('content')

<!-- Blog Start -->
<div class="container-fluid blog py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 500px;">
            <h4 class="text-primary">À propos d’Ehsan</h4>
            <h1 class="display-4 mb-4">Nos Associations Partenaires</h1>
            <p class="mb-0">
                Découvrez les associations partenaires de la plateforme <strong>Ehsan</strong>. Chaque organisation œuvre pour le bien-être de la société. En vous connectant à Ehsan, vous pouvez soutenir directement leurs actions à travers des dons et des collaborations.
            </p>
        </div>

        <div class="row g-4">
            @foreach ($associations as $association)
                <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="blog-item h-100 d-flex flex-column">
                        <div class="blog-img">
                            <img src="data:image/png;base64,{{ $association->logo }}" class="img-fluid rounded-top w-100" alt="{{ $association->nom }}">
                            <div class="blog-categiry py-2 px-4">
                                <span>{{ $association->nom }}</span>
                            </div>
                        </div>
                        <div class="blog-content p-4 d-flex flex-column flex-grow-1">
                            <a href="#" class="h4 d-inline-block mb-3">
                                {{ Str::limit($association->description, 70) }}
                            </a>
                            <div class="blog-comment d-flex flex-column gap-2 mb-3">
                                <div class="small"><i class="fas fa-map-marker-alt text-primary me-2"></i> {{ $association->ville }}, {{ Str::limit($association->adresse, 100) }}</div>
                                <div class="small"><i class="fas fa-phone text-primary me-2"></i> {{ $association->telephone }}</div>
                                <div class="small"><i class="fas fa-globe text-primary me-2"></i> <a href="{{ $association->site_web }}" target="_blank">{{ $association->site_web }}</a></div>
                                <div class="small"><i class="fas fa-envelope text-primary me-2"></i> {{ $association->email }}</div>
                                <div class="small"><i class="fas fa-mail-bulk text-primary me-2"></i> {{ $association->code_postal }}</div>
                            </div>
                            <a href="{{ route('associations.show', $association->id) }}" class="btn p-0 mt-auto btn-primary w-50 text-white p-3">
                                En savoir plus <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
