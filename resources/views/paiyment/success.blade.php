@extends('layouts.app')

@section('title', 'Faire un don - ' . $association->name)

@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
<style>
    .amount-btn {
        transition: all 0.3s ease;
        cursor: pointer;
    }
    .amount-btn:hover {
        transform: translateY(-2px);
        background: #3b82f6 !important;
        color: white !important;
        border-color: #3b82f6 !important;
    }
    .amount-btn.selected {
        background: #1d4ed8 !important;
        color: white !important;
        border-color: #1d4ed8 !important;
        transform: translateY(-2px) scale(1.05);
        box-shadow: 0 4px 12px rgba(29, 78, 216, 0.3);
    }
    .loading-spinner {
        border: 2px solid #f3f3f3;
        border-top: 2px solid #3b82f6;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        animation: spin 1s linear infinite;
    }
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    #card-element {
        padding: 12px;
        border: 2px solid #e5e7eb;
        border-radius: 8px;
        background: white;
        min-height: 50px;
        transition: border-color 0.3s ease;
    }

    #card-element:focus-within {
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }

    .blue-gradient {
        background: linear-gradient(135deg, #3b82f6 0%, #1e40af 100%);
    }
    .green-gradient {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    }
</style>
@endpush

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Layout horizontal -->
    <div class="max-w-7xl mx-auto">
        <div class="grid lg:grid-cols-2 gap-8 items-start">

            <!-- Colonne gauche - Informations de l'association -->
            <div class="space-y-6">
                <!-- En-tête avec informations de l'association -->
                <div class="bg-white rounded-lg shadow-lg border border-gray-200 p-6">
                    <div class="flex items-start space-x-4">
                        <!-- Logo de l'association -->
                        <div class="flex-shrink-0">
                            @if($association->logo)
                                <img src="{{ asset('storage/' . $association->logo) }}"
                                     alt="Logo {{ $association->name }}"
                                     class="w-16 h-16 rounded-full object-cover border-2 border-gray-200">
                            @else
                                <div class="w-16 h-16 bg-blue-500 rounded-full flex items-center justify-center">
                                    <i class="fas fa-heart text-white text-xl"></i>
                                </div>
                            @endif
                        </div>

                        <!-- Informations de l'association -->
                        <div class="flex-1">
                            <h1 class="text-2xl font-bold text-gray-900 mb-2">{{ $association->name }}</h1>
                            @if($association->description)
                                <p class="text-gray-600 mb-3 leading-relaxed">{{ $association->description }}</p>
                            @endif
                            <div class="flex flex-wrap items-center gap-4 text-sm text-gray-500">
                                @if($association->website)
                                    <a href="{{ $association->website }}" target="_blank" class="flex items-center hover:text-blue-600 transition-colors">
                                        <i class="fas fa-globe mr-1"></i>
                                        Site web
                                    </a>
                                @endif
                                @if($association->email)
                                    <a href="mailto:{{ $association->email }}" class="flex items-center hover:text-blue-600 transition-colors">
                                        <i class="fas fa-envelope mr-1"></i>
                                        {{ $association->email }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Informations de confiance -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div class="bg-white rounded-lg p-4 text-center shadow-sm border border-gray-200">
                        <i class="fas fa-shield-alt text-green-500 text-2xl mb-2"></i>
                        <h4 class="font-medium text-gray-800 mb-1">100% Sécurisé</h4>
                        <p class="text-gray-600 text-sm">Paiement crypté par Stripe</p>
                    </div>
                    <div class="bg-white rounded-lg p-4 text-center shadow-sm border border-gray-200">
                        <i class="fas fa-heart text-red-500 text-2xl mb-2"></i>
                        <h4 class="font-medium text-gray-800 mb-1">Impact direct</h4>
                        <p class="text-gray-600 text-sm">100% pour la cause</p>
                    </div>
                    <div class="bg-white rounded-lg p-4 text-center shadow-sm border border-gray-200">
                        <i class="fas fa-file-invoice text-blue-500 text-2xl mb-2"></i>
                        <h4 class="font-medium text-gray-800 mb-1">Reçu fiscal</h4>
                        <p class="text-gray-600 text-sm">Déduction d'impôts</p>
                    </div>
                </div>

                <!-- Informations supplémentaires -->
                <div class="bg-gray-50 rounded-lg p-6 border border-gray-200">
                    <h3 class="font-semibold text-gray-900 mb-3">
                        <i class="fas fa-info-circle mr-2 text-blue-500"></i>
                        Pourquoi faire un don ?
                    </h3>
                    <ul class="space-y-2 text-gray-600 text-sm">
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mr-2 mt-0.5 text-xs"></i>
                            Votre don est déductible des impôts à hauteur de 66%
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mr-2 mt-0.5 text-xs"></i>
                            Un reçu fiscal vous sera envoyé automatiquement
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mr-2 mt-0.5 text-xs"></i>
                            100% de votre don va directement à l'association
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mr-2 mt-0.5 text-xs"></i>
                            Paiement sécurisé et données protégées
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Colonne droite - Formulaire de don -->
            <div class="lg:sticky lg:top-8">
                <div class="bg-white rounded-lg shadow-lg border border-gray-200">
                    <!-- En-tête du formulaire -->
                    <div class="blue-gradient px-6 py-4 rounded-t-lg">
                        <h2 class="text-xl font-semibold text-white text-center">
                            <i class="fas fa-heart mr-2"></i>
                            Faire un don
                        </h2>
                        <p class="text-blue-100 text-center text-sm mt-1">Choisissez le montant de votre don</p>
                    </div>

                    <form id="payment-form" class="p-6 space-y-6">
                        @csrf
                        <input type="hidden" id="association_id" value="{{ $association->id }}">

                        <!-- Montants prédéfinis -->
                        <div>
                            <label class="block text-gray-900 font-semibold mb-3">Montants suggérés</label>
                            <div class="grid grid-cols-3 gap-3 mb-4">
                                @foreach([10, 25, 50, 100, 250, 500] as $amount)
                                    <button type="button"
                                            class="amount-btn bg-gray-50 text-gray-700 font-medium py-3 px-4 rounded-lg border-2 border-gray-200 text-center transition-all"
                                            data-amount="{{ $amount }}">
                                        {{ $amount }}€
                                    </button>
                                @endforeach
                            </div>
                        </div>

                        <!-- Montant personnalisé -->
                        <div>
                            <label for="amount" class="block text-gray-900 font-semibold mb-2">
                                Montant personnalisé
                            </label>
                            <div class="relative">
                                <input type="number"
                                       id="amount"
                                       min="1"
                                       required
                                       class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition-colors pr-10 text-lg"
                                       placeholder="Saisissez un montant">
                                <span class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 font-medium text-lg">€</span>
                            </div>
                        </div>

                        <!-- Informations de paiement -->
                        <div>
                            <label class="block text-gray-900 font-semibold mb-2">
                                <i class="fas fa-credit-card text-blue-500 mr-2"></i>
                                Informations de carte bancaire
                            </label>

                            <!-- Élément de carte Stripe -->
                            <div id="card-element" class="mb-3">
                                <div style="color: #666; text-align: center; padding: 15px;">
                                    Chargement de l'élément de carte...
                                </div>
                            </div>

                            <div class="flex items-center text-sm text-gray-600 bg-blue-50 p-3 rounded-lg">
                                <i class="fas fa-shield-alt text-blue-500 mr-2"></i>
                                <span>Paiement 100% sécurisé par Stripe</span>
                            </div>
                        </div>

                        <!-- Erreurs -->
                        <div id="card-errors" class="text-red-600 bg-red-50 p-3 rounded-lg hidden border border-red-200"></div>

                        <!-- Bouton de soumission -->
                        <button id="submit"
                                type="submit"
                                class="w-full blue-gradient hover:from-blue-600 hover:to-blue-800 text-white py-4 px-6 rounded-lg font-semibold text-lg shadow-lg hover:shadow-xl transition-all duration-300 flex items-center justify-center space-x-2">
                            <i class="fas fa-lock"></i>
                            <span id="button-text">Faire un don</span>
                            <div id="loading-spinner" class="loading-spinner hidden ml-2"></div>
                        </button>

                        <!-- Informations légales -->
                        <div class="text-center text-xs text-gray-500 pt-4 border-t border-gray-100">
                            <p class="mb-1">
                                <i class="fas fa-receipt mr-1"></i>
                                Reçu fiscal envoyé automatiquement par email
                            </p>
                            <p>
                                <i class="fas fa-info-circle mr-1"></i>
                                En continuant, vous acceptez nos conditions d'utilisation
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script>
console.log('🚀 Script chargé');

document.addEventListener('DOMContentLoaded', function() {
    console.log('📄 DOM ready');

    setTimeout(function() {
        console.log('⏰ Initialisation Stripe...');

        if (typeof Stripe === 'undefined') {
            console.error('❌ Stripe non trouvé');
            document.getElementById('card-errors').textContent = 'Erreur: Stripe non chargé';
            document.getElementById('card-errors').classList.remove('hidden');
            return;
        }

        const stripeKey = '{{ config('services.stripe.key') }}';
        if (!stripeKey) {
            console.error('❌ Clé Stripe manquante');
            document.getElementById('card-errors').textContent = 'Configuration Stripe manquante';
            document.getElementById('card-errors').classList.remove('hidden');
            return;
        }

        try {
            const stripe = Stripe(stripeKey);
            const elements = stripe.elements();

            const card = elements.create('card', {
                style: {
                    base: {
                        fontSize: '16px',
                        color: '#374151',
                        '::placeholder': {
                            color: '#9CA3AF',
                        },
                    },
                    invalid: {
                        color: '#ef4444',
                    },
                },
            });

            // Vider le contenu et monter la carte
            document.getElementById('card-element').innerHTML = '';
            card.mount('#card-element');
            console.log('✅ Carte montée avec succès');

            // Gestion des erreurs de carte
            card.on('change', function(event) {
                const displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                    displayError.classList.remove('hidden');
                } else {
                    displayError.textContent = '';
                    displayError.classList.add('hidden');
                }
            });

            // Variables du DOM
            const form = document.getElementById('payment-form');
            const submitButton = document.getElementById('submit');
            const loadingSpinner = document.getElementById('loading-spinner');
            const buttonText = document.getElementById('button-text');
            const amountInput = document.getElementById('amount');
            const cardErrors = document.getElementById('card-errors');

            // Fonction pour mettre à jour le texte du bouton
            function updateButtonText(amount) {
                if (amount && amount > 0) {
                    buttonText.textContent = `Faire un don de ${amount}€`;
                } else {
                    buttonText.textContent = 'Faire un don';
                }
            }

            // Fonction pour réinitialiser tous les boutons
            function resetAllButtons() {
                document.querySelectorAll('.amount-btn').forEach(function(btn) {
                    btn.classList.remove('selected');
                    btn.style.backgroundColor = '#f9fafb';
                    btn.style.color = '#374151';
                    btn.style.borderColor = '#e5e7eb';
                    btn.style.transform = 'none';
                    btn.style.boxShadow = 'none';
                });
            }

            // Fonction pour sélectionner un bouton
            function selectButton(button) {
                button.classList.add('selected');
                button.style.backgroundColor = '#1d4ed8';
                button.style.color = 'white';
                button.style.borderColor = '#1d4ed8';
                button.style.transform = 'translateY(-2px) scale(1.05)';
                button.style.boxShadow = '0 4px 12px rgba(29, 78, 216, 0.3)';
            }

            // Gestion des boutons de montant
            document.querySelectorAll('.amount-btn').forEach(function(button) {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    console.log('Bouton cliqué:', this.getAttribute('data-amount'));

                    resetAllButtons();
                    selectButton(this);

                    const amount = this.getAttribute('data-amount');
                    amountInput.value = amount;
                    updateButtonText(amount);
                });
            });

            // Gestion du montant personnalisé
            amountInput.addEventListener('input', function() {
                resetAllButtons();
                updateButtonText(this.value);
            });

            // Gestion du formulaire
            form.addEventListener('submit', async function(e) {
                e.preventDefault();
                console.log('Formulaire soumis');

                const amount = amountInput.value;
                const association_id = document.getElementById('association_id').value;

                if (!amount || amount <= 0) {
                    cardErrors.textContent = 'Veuillez saisir un montant valide.';
                    cardErrors.classList.remove('hidden');
                    return;
                }

                // Désactiver le bouton et afficher le spinner
                submitButton.disabled = true;
                loadingSpinner.classList.remove('hidden');
                buttonText.textContent = 'Traitement en cours...';
                cardErrors.classList.add('hidden');

                try {
                    // Créer l'intent de paiement
                    const response = await fetch("{{ route('stripe.create.intent') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({
                            amount: amount,
                            association_id: association_id
                        })
                    });

                    const data = await response.json();

                    if (data.error) {
                        throw new Error(data.error);
                    }

                    // Confirmer le paiement
                    const result = await stripe.confirmCardPayment(data.clientSecret, {
                        payment_method: {
                            card: card,
                        }
                    });

                    if (result.error) {
                        cardErrors.textContent = result.error.message;
                        cardErrors.classList.remove('hidden');
                    } else {
                        if (result.paymentIntent.status === 'succeeded') {
                            // Sauvegarder en base
                            await fetch("{{ route('paiyment.store') }}", {
                                method: "POST",
                                headers: {
                                    "Content-Type": "application/json",
                                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                                },
                                body: JSON.stringify({
                                    amount: amount,
                                    association_id: association_id,
                                    payment_intent_id: result.paymentIntent.id
                                })
                            });

                            // Succès
                            buttonText.textContent = 'Don réussi !';
                            submitButton.style.background = 'linear-gradient(135deg, #10b981 0%, #059669 100%)';

                            setTimeout(function() {
                                window.location.href = "{{ route('payment.success') }}";
                            }, 1500);
                        }
                    }
                } catch (error) {
                    console.error('Erreur:', error);
                    cardErrors.textContent = error.message || 'Une erreur est survenue.';
                    cardErrors.classList.remove('hidden');
                } finally {
                    if (submitButton.disabled && !buttonText.textContent.includes('réussi')) {
                        submitButton.disabled = false;
                        loadingSpinner.classList.add('hidden');
                        updateButtonText(amount);
                    }
                }
            });

        } catch (error) {
            console.error('❌ Erreur Stripe:', error);
            document.getElementById('card-errors').textContent = 'Erreur d\'initialisation: ' + error.message;
            document.getElementById('card-errors').classList.remove('hidden');
        }

    }, 1000);
});
</script>
@endpush
