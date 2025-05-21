@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto bg-white shadow-lg rounded-2xl mt-10 overflow-hidden mb-5">

    <!-- En-tête avec logo + titre -->
    <div class="flex items-center bg-dark from-blue-600 to-indigo-700 px-6 py-4 space-x-4">
        <img src="{{ asset('img/Ehsan_Logo2.png') }}" alt="Logo Ehsan" class="w-12 h-12">
        <div>
            <h2 class="text-xl font-bold text-white">Ajouter une publication</h2>
            <p class="text-blue-100 text-sm">Exprimez-vous librement ou partagez une annonce</p>
        </div>
    </div>

    <div class="p-6">
        @if(session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('Publications.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Ligne : Titre -->
            <div class="flex items-center space-x-4">
                <label for="titre" class="w-40 text-sm font-medium text-gray-700">Titre de la publication</label>
                <input type="text" name="titre" id="titre" required
                       class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                       placeholder="Titre">
                @error('titre')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Ligne : Contenu -->
            <div class="flex items-start space-x-4">
                <label for="contenu" class="w-40 text-sm font-medium text-gray-700 mt-2">Contenu</label>
                <textarea name="contenu" id="contenu" rows="4" required
                          class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                          placeholder="Écrivez votre contenu ici..."></textarea>
                @error('contenu')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Ligne : Image -->
            <div class="flex items-center space-x-4">
                <label for="image" class="w-40 text-sm font-medium text-gray-700">Image (optionnelle)</label>
                <input type="file" name="image" id="image"
                       class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 file:bg-blue-600 file:text-white file:px-4 file:py-2 file:rounded file:cursor-pointer hover:file:bg-blue-700">
                @error('image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Bouton -->
            <div class="flex justify-end">
                <button type="submit"
                        class="bg-dark  w-50 from-blue-600 to-indigo-700 text-white px-6 py-2 rounded-lg shadow hover:from-blue-700 hover:to-indigo-800 transition">
                    Publier
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
