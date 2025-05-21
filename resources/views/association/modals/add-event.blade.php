@extends('layouts.app')

@section('content')
<div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">

        <!-- En-tête avec logo + titre -->
        <div class="flex items-center bg-gradient-to-r bg-dark to-indigo-700 px-6 py-4 space-x-4">
            <img src="{{ asset('img/Ehsan_Logo2.png') }}" alt="Logo Ehsan" class="w-14 h-14">
            <div>
                <h2 class="text-xl font-bold text-white">Créer un nouvel événement</h2>
                <p class="text-blue-100 text-sm">Remplissez les détails de votre événement</p>
            </div>
        </div>

        <!-- Formulaire horizontal -->
        <form method="POST" action="{{ route('events.store') }}" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf

            <!-- Ligne : Titre -->
            <div class="flex items-center space-x-4">
                <label for="titre" class="w-40 text-sm font-medium text-gray-700">Titre de l'événement</label>
                <input type="text" name="titre" id="titre" required
                    class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                    placeholder="Titre de l'événement">
            </div>

            <!-- Ligne : Description -->
            <div class="flex items-start space-x-4">
                <label for="description" class="w-40 text-sm font-medium text-gray-700 mt-2">Description</label>
                <textarea name="description" id="description" rows="3"
                    class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                    placeholder="Décrivez l'événement..."></textarea>
            </div>

            <!-- Ligne : Date -->
            <div class="flex items-center space-x-4">
                <label for="date" class="w-40 text-sm font-medium text-gray-700">Date</label>
                <input type="date" name="date" id="date" required
                    class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Ligne : Lieu -->
            <div class="flex items-center space-x-4">
                <label for="lieu" class="w-40 text-sm font-medium text-gray-700">Lieu</label>
                <input type="text" name="lieu" id="lieu" required
                    class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                    placeholder="Lieu de l'événement">
            </div>

            <!-- Ligne : Image -->
            <div class="flex items-center space-x-4">
                <label for="image" class="w-40 text-sm font-medium text-gray-700">Image</label>
                <input type="file" name="image" id="image"
                    class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Bouton -->
            <div class="flex justify-end">
                <button type="submit"
                    class="inline-flex items-center px-6 py-3 text-white font-semibold bg-dark from-blue-600 to-indigo-700 hover:from-blue-700 hover:to-indigo-800 rounded-lg shadow-md transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4v16m8-8H4" />
                    </svg>
                    Publier l'événement
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
