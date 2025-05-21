@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto py-12 px-6">
    <div class="grid md:grid-cols-2 gap-8 bg-white shadow-xl rounded-xl p-6">
        <!-- Image de l'association -->
        <div>
            <img src="data:image/png;base64,{{ $association->logo }}"
                 alt="Image de l'association"
                 class="w-full h-64 object-cover rounded-lg shadow">
                 <div class="mt-4 p-4 bg-green-100 text-green-800 rounded-lg shadow text-center font-semibold">
    Merci de soutenir {{ $association->nom }} ! Votre don fait une vraie différence.
</div>

        </div>

        <!-- Infos + Formulaire -->
        <div>
            <h2 class="text-3xl font-bold text-gray-800 mb-2">{{ $association->nom }}</h2>
            <p class="text-gray-600 mb-4">{{ $association->description }}</p>

            <div class="mb-6">
                <p class="text-sm text-gray-500"><strong>Email :</strong> {{ $association->email }}</p>
                <p class="text-sm text-gray-500"><strong>Téléphone :</strong> {{ $association->telephone }}</p>
                <p class="text-sm text-gray-500"><strong>Adresse :</strong> {{ $association->adresse }}</p>
            </div>

            <!-- Formulaire statique -->
            <form method="POST" action="{{ route('paiyment.store') }}" class="space-y-4">
    @csrf
    <input type="hidden" name="association_id" value="{{ $association->id }}">

    <!-- Montant -->
    <div>
        <label for="amount" class="block text-gray-700 font-semibold mb-1">Montant du don (€)</label>
        <input type="number" name="amount" required min="1"
               class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300">
    </div>

    <!-- Nom du donateur -->
    <div>
        <label for="donor_name" class="block text-gray-700 font-semibold mb-1">Nom du donateur</label>
        <input type="text" name="donor_name" required
               class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300">
    </div>

    <!-- Type de carte (radio) -->
    <div>
        <span class="block text-gray-700 font-semibold mb-2">Type de carte</span>
        <div class="flex gap-6">
            <!-- Visa -->
            <label class="cursor-pointer flex items-center space-x-2">
                <input type="radio" name="card_type" value="visa" class="form-radio text-blue-600" required>
                <svg class="w-8 h-8" viewBox="0 0 36 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                    <rect width="36" height="24" rx="4" fill="#1A1F71"/>
                    <path fill="#fff" d="M7 17l-2-10h3l1 8 2-8h2l-3 10H7z"/>
                    <path fill="#F8C300" d="M17 7h3l1 3h2l-3-4h-3l-2 4h2l1-3z"/>
                    <path fill="#fff" d="M28 7h-3l-2 10h3l2-10z"/>
                </svg>
            </label>

            <!-- Mastercard -->
            <label class="cursor-pointer flex items-center space-x-2">
                <input type="radio" name="card_type" value="mastercard" class="form-radio text-red-600" required>
                <svg class="w-8 h-8" viewBox="0 0 36 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                    <rect width="36" height="24" rx="4" fill="#FF5F00"/>
                    <circle cx="13" cy="12" r="7" fill="#EB001B"/>
                    <circle cx="23" cy="12" r="7" fill="#F79E1B"/>
                    <path fill="#fff" d="M20 12a8 8 0 0 1-7 7.9A8 8 0 0 1 20 12z"/>
                </svg>
            </label>

            <!-- American Express -->
            <label class="cursor-pointer flex items-center space-x-2">
                <input type="radio" name="card_type" value="amex" class="form-radio text-blue-500" required>
                <svg class="w-8 h-8" viewBox="0 0 36 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                    <rect width="36" height="24" rx="4" fill="#2E77BB"/>
                    <text x="18" y="16" fill="white" font-weight="700" font-family="Arial" font-size="10" text-anchor="middle">AMEX</text>
                </svg>
            </label>
        </div>
    </div>

    <!-- Numéro de carte -->
    <div>
        <label for="card_number" class="block text-gray-700 font-semibold mb-1">Numéro de carte</label>
        <input type="text" name="card_number" required maxlength="19" placeholder="1234 5678 9012 3456"
               class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300">
    </div>

    <!-- Date d'expiration & CVC -->
    <div class="grid grid-cols-2 gap-4">
        <div>
            <label for="card_expiry" class="block text-gray-700 font-semibold mb-1">Date d'expiration</label>
            <input type="text" name="card_expiry" required placeholder="MM/AA"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300">
        </div>
        <div>
            <label for="card_cvc" class="block text-gray-700 font-semibold mb-1">CVC</label>
            <input type="text" name="card_cvc" required maxlength="4" placeholder="123"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300">
        </div>
    </div>

    <!-- Bouton -->
    <button type="submit"
            class="w-full bg-green-600 text-white font-semibold py-2 px-4 rounded-lg shadow hover:bg-green-700 transition">
        Faire un don
    </button>
</form>

        </div>
    </div>
</div>
@endsection
