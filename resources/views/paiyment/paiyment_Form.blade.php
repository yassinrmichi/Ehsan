<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ehsan | Dons</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .amount-btn {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
        }
        .amount-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }
        .amount-btn.selected {
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            color: white;
            border-color: #1d4ed8;
            transform: translateY(-2px) scale(1.02);
            box-shadow: 0 15px 35px rgba(59, 130, 246, 0.4);
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

        .card-container {
            position: relative;
            background: linear-gradient(145deg, #ffffff, #f8fafc);
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 16px;
            transition: all 0.3s ease;
        }

        .card-container:focus-within {
            border-color: #3b82f6;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
            background: #ffffff;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .success-animation {
            animation: successPulse 0.6s ease-in-out;
        }

        @keyframes successPulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        .progress-bar {
            height: 4px;
            background: linear-gradient(90deg, #3b82f6, #8b5cf6, #06b6d4);
            border-radius: 2px;
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.3s ease;
        }

        .progress-bar.active {
            transform: scaleX(1);
        }

        .association-card {
            background: linear-gradient(135deg, #f8fafc 0%, #ffffff 100%);
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
        }

        .association-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-50 via-white to-purple-50 min-h-screen py-8">
    <div class="container mx-auto px-4 max-w-6xl">

        <!-- En-tête avec informations de l'association -->
        <div class="mb-8">
            <div class="association-card rounded-2xl p-6 shadow-lg">
                <div class="flex items-center space-x-6">
                    <!-- Logo de l'association -->
                    <div class="flex-shrink-0">
                        <img src="data:image/png;base64,{{ $association->logo }}" alt="Logo {{ $association->name }}" class="w-20 h-20 rounded-full object-cover border-4 border-blue-100 shadow-lg">

                    </div>

                    <!-- Informations de l'association -->
                    <div class="flex-1">
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">Association Cœur Solidaire</h1>
                        <!-- Remplacez par : <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $association->name }}</h1> -->

                        <p class="text-gray-600 mb-3 leading-relaxed">
                            Nous œuvrons pour l'aide aux personnes en difficulté et la lutte contre la précarité. Votre soutien nous permet d'agir concrètement sur le terrain.
                        </p>
                        <!-- Remplacez par : <p class="text-gray-600 mb-3 leading-relaxed">{{ $association->description }}</p> -->

                        <div class="flex flex-wrap items-center gap-4 text-sm text-gray-500">
                            <a href="https://example.com" target="_blank" class="flex items-center hover:text-blue-600 transition-colors">
                                <i class="fas fa-globe mr-1"></i>
                               {{ $association->site_web }}
                            </a>
                            <a href="mailto:contact@association.com" class="flex items-center hover:text-blue-600 transition-colors">
                                <i class="fas fa-envelope mr-1"></i>
                               {{ $association->email }}
                            </a>
                            <div class="flex items-center text-green-600">
                                <i class="fas fa-certificate mr-1"></i>
                                Association reconnue d'utilité publique
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Layout horizontal : Informations + Formulaire -->
        <div class="grid lg:grid-cols-2 gap-8 items-start">

            <!-- Colonne gauche - Informations et impact -->
            <div class="space-y-6">

                <!-- Informations de confiance -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div class="bg-white rounded-xl p-4 text-center shadow-lg border border-gray-100 hover:shadow-xl transition-shadow">
                        <i class="fas fa-shield-alt text-green-500 text-2xl mb-2"></i>
                        <h4 class="font-semibold text-gray-800 mb-1">100% Sécurisé</h4>
                        <p class="text-gray-600 text-sm">Paiement crypté par Stripe</p>
                    </div>
                    <div class="bg-white rounded-xl p-4 text-center shadow-lg border border-gray-100 hover:shadow-xl transition-shadow">
                        <i class="fas fa-heart text-red-500 text-2xl mb-2"></i>
                        <h4 class="font-semibold text-gray-800 mb-1">Impact direct</h4>
                        <p class="text-gray-600 text-sm">100% pour la cause</p>
                    </div>
                    <div class="bg-white rounded-xl p-4 text-center shadow-lg border border-gray-100 hover:shadow-xl transition-shadow">
                        <i class="fas fa-file-invoice text-blue-500 text-2xl mb-2"></i>
                        <h4 class="font-semibold text-gray-800 mb-1">Reçu fiscal</h4>
                        <p class="text-gray-600 text-sm">Déduction 66%</p>
                    </div>
                </div>

                <!-- Impact de votre don -->
                <div class="bg-white rounded-xl p-6 shadow-lg border border-gray-100">
                    <h3 class="font-bold text-gray-900 mb-4 flex items-center">
                        <i class="fas fa-chart-line text-blue-500 mr-2"></i>
                        L'impact de votre don
                    </h3>
                    <div class="space-y-4">
                        <div class="flex items-center p-3 bg-blue-50 rounded-lg">
                            <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold mr-4">
                                10€
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">Un repas chaud</p>
                                <p class="text-sm text-gray-600">Pour une personne en difficulté</p>
                            </div>
                        </div>
                        <div class="flex items-center p-3 bg-green-50 rounded-lg">
                            <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center text-white font-bold mr-4">
                                25€
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">Kit d'hygiène</p>
                                <p class="text-sm text-gray-600">Produits de première nécessité</p>
                            </div>
                        </div>
                        <div class="flex items-center p-3 bg-purple-50 rounded-lg">
                            <div class="w-12 h-12 bg-purple-500 rounded-full flex items-center justify-center text-white font-bold mr-4">
                                50€
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">Aide au logement</p>
                                <p class="text-sm text-gray-600">Contribution aux frais d'hébergement</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Témoignage -->
                <div class="bg-gradient-to-r from-blue-50 to-purple-50 rounded-xl p-6 border border-blue-100">
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-quote-left text-white"></i>
                        </div>
                        <div>
                            <p class="text-gray-700 italic mb-2">
                                "Grâce à vos dons, nous avons pu aider plus de 500 familles cette année. Chaque contribution compte et fait une réelle différence."
                            </p>
                            <p class="text-sm font-semibold text-gray-600">
                                - Marie Dubois, Directrice de l'association
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Colonne droite - Formulaire de don -->
            <div class="lg:sticky lg:top-8">
                <div class="bg-white rounded-2xl shadow-2xl overflow-hidden border border-gray-100">
                    <!-- Barre de progression -->
                    <div class="progress-bar" id="progress-bar"></div>

                    <!-- En-tête du formulaire -->
                    <div class="gradient-bg px-8 py-6">
                        <h2 class="text-xl font-semibold text-white text-center flex items-center justify-center">
                            <i class="fas fa-gift mr-2"></i>
                            Choisissez votre contribution
                        </h2>
                        <p class="text-blue-100 text-center text-sm mt-1">Votre don fait la différence</p>
                    </div>

                    <form id="payment-form" class="p-8 space-y-6">
                        <input type="hidden" id="association_id" value="1">

                        <!-- Montants prédéfinis -->
                        <div class="space-y-4">
                            <label class="block text-gray-900 font-semibold text-lg">
                                <i class="fas fa-euro-sign text-blue-500 mr-2"></i>
                                Montants suggérés
                            </label>
                            <div class="grid grid-cols-2 gap-3">
                                <button type="button" class="amount-btn bg-gray-50 hover:bg-blue-500 hover:text-white text-gray-700 font-semibold py-4 px-4 rounded-xl border-2 border-gray-200 hover:border-blue-500 text-center" data-amount="10">
                                    10€
                                </button>
                                <button type="button" class="amount-btn bg-gray-50 hover:bg-blue-500 hover:text-white text-gray-700 font-semibold py-4 px-4 rounded-xl border-2 border-gray-200 hover:border-blue-500 text-center" data-amount="25">
                                    25€
                                </button>
                                <button type="button" class="amount-btn bg-gray-50 hover:bg-blue-500 hover:text-white text-gray-700 font-semibold py-4 px-4 rounded-xl border-2 border-gray-200 hover:border-blue-500 text-center" data-amount="50">
                                    50€
                                </button>
                                <button type="button" class="amount-btn bg-gray-50 hover:bg-blue-500 hover:text-white text-gray-700 font-semibold py-4 px-4 rounded-xl border-2 border-gray-200 hover:border-blue-500 text-center" data-amount="100">
                                    100€
                                </button>
                            </div>
                        </div>

                        <!-- Montant personnalisé -->
                        <div class="space-y-2">
                            <label for="amount" class="block text-gray-900 font-semibold">
                                <i class="fas fa-edit text-green-500 mr-2"></i>
                                Ou saisissez un montant personnalisé
                            </label>
                            <div class="relative">
                                <input type="number"
                                       id="amount"
                                       min="1"
                                       required
                                       class="w-full px-4 py-3 text-lg border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition-all duration-300 pr-12 bg-gray-50 focus:bg-white"
                                       placeholder="Montant en euros">
                                <span class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 text-lg font-semibold">€</span>
                            </div>
                        </div>

                        <!-- Informations de paiement -->
                        <div class="space-y-4">
                            <label class="block text-gray-900 font-semibold">
                                <i class="fas fa-credit-card text-purple-500 mr-2"></i>
                                Informations de carte bancaire
                            </label>

                            <div class="card-container" id="card-element">
                                <!-- L'élément de carte Stripe sera inséré ici -->
                            </div>

                            <!-- Badges de sécurité -->
                            <div class="flex items-center justify-center space-x-4 text-sm text-gray-600 bg-blue-50 p-3 rounded-xl">
                                <div class="flex items-center">
                                    <i class="fas fa-shield-alt text-blue-500 mr-1"></i>
                                    <span>SSL</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-lock text-green-500 mr-1"></i>
                                    <span>Stripe</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-check-circle text-purple-500 mr-1"></i>
                                    <span>PCI DSS</span>
                                </div>
                            </div>
                        </div>

                        <!-- Zone d'erreurs -->
                        <div id="card-errors" class="text-red-600 bg-red-50 p-4 rounded-xl hidden border border-red-200">
                            <i class="fas fa-exclamation-triangle mr-2"></i>
                            <span id="error-message"></span>
                        </div>

                        <!-- Bouton de soumission -->
                        <button id="submit"
                                type="submit"
                                class="w-full gradient-bg hover:shadow-2xl text-white py-4 px-8 rounded-xl font-semibold text-lg shadow-lg transition-all duration-300 flex items-center justify-center space-x-3 transform hover:-translate-y-1">
                            <i class="fas fa-heart"></i>
                            <span id="button-text">Faire un don</span>
                            <div id="loading-spinner" class="loading-spinner hidden"></div>
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

    <script>
        // Initialisation avec gestion d'erreurs robuste
        document.addEventListener('DOMContentLoaded', function() {
            console.log('🚀 Initialisation du formulaire de don...');

            // Animation de la barre de progression
            setTimeout(() => {
                document.getElementById('progress-bar').classList.add('active');
            }, 500);

            // Vérification de Stripe
            if (typeof Stripe === 'undefined') {
                showError('Impossible de charger Stripe. Vérifiez votre connexion internet.');
                return;
            }

            // Configuration Stripe (remplacez par votre vraie clé)
            const stripe = Stripe('pk_test_51234567890abcdef'); // Remplacez par votre clé
            const elements = stripe.elements();

            // Création de l'élément de carte avec style personnalisé
            const card = elements.create('card', {
                style: {
                    base: {
                        fontSize: '16px',
                        color: '#374151',
                        fontFamily: 'system-ui, sans-serif',
                        '::placeholder': {
                            color: '#9CA3AF',
                        },
                        iconColor: '#6366f1',
                    },
                    invalid: {
                        color: '#ef4444',
                        iconColor: '#ef4444',
                    },
                },
                hidePostalCode: true
            });

            // Montage de l'élément de carte
            card.mount('#card-element');

            // Variables du DOM
            const form = document.getElementById('payment-form');
            const submitButton = document.getElementById('submit');
            const loadingSpinner = document.getElementById('loading-spinner');
            const buttonText = document.getElementById('button-text');
            const amountInput = document.getElementById('amount');
            const cardErrors = document.getElementById('card-errors');
            const errorMessage = document.getElementById('error-message');

            // Gestion des erreurs de carte en temps réel
            card.on('change', function(event) {
                if (event.error) {
                    showError(event.error.message);
                } else {
                    hideError();
                }
            });

            // Fonctions utilitaires
            function showError(message) {
                errorMessage.textContent = message;
                cardErrors.classList.remove('hidden');
            }

            function hideError() {
                cardErrors.classList.add('hidden');
            }

            function updateButtonText(amount) {
                if (amount && amount > 0) {
                    buttonText.innerHTML = `<i class="fas fa-heart mr-2"></i>Faire un don de ${amount}€`;
                } else {
                    buttonText.innerHTML = `<i class="fas fa-heart mr-2"></i>Faire un don`;
                }
            }

            function resetAmountButtons() {
                document.querySelectorAll('.amount-btn').forEach(btn => {
                    btn.classList.remove('selected');
                });
            }

            function selectAmountButton(button) {
                resetAmountButtons();
                button.classList.add('selected');
            }

            // Gestion des montants prédéfinis
            document.querySelectorAll('.amount-btn').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();

                    selectAmountButton(this);
                    const amount = this.getAttribute('data-amount');
                    amountInput.value = amount;
                    updateButtonText(amount);

                    // Animation de feedback
                    this.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        this.style.transform = '';
                    }, 150);
                });
            });

            // Gestion du montant personnalisé
            amountInput.addEventListener('input', function() {
                resetAmountButtons();
                updateButtonText(this.value);
            });

            // Gestion de la soumission du formulaire
            form.addEventListener('submit', async function(e) {
                e.preventDefault();

                const amount = amountInput.value;
                const association_id = document.getElementById('association_id').value;

                // Validation
                if (!amount || amount <= 0) {
                    showError('Veuillez saisir un montant valide (minimum 1€).');
                    amountInput.focus();
                    return;
                }

                // État de chargement
                submitButton.disabled = true;
                loadingSpinner.classList.remove('hidden');
                buttonText.textContent = 'Traitement en cours...';
                hideError();

                try {
                    // Simulation de l'appel API (remplacez par votre vraie route Laravel)
                    console.log('Création de l\'intent de paiement...', { amount, association_id });

                    // Simulation pour la démo
                    await new Promise(resolve => setTimeout(resolve, 2000));
                    showSuccess();

                } catch (error) {
                    console.error('Erreur:', error);
                    showError(error.message || 'Une erreur est survenue. Veuillez réessayer.');
                } finally {
                    // Réactiver le bouton si pas de succès
                    if (!buttonText.textContent.includes('Merci')) {
                        submitButton.disabled = false;
                        loadingSpinner.classList.add('hidden');
                        updateButtonText(amount);
                    }
                }
            });

            function showSuccess() {
                buttonText.innerHTML = '<i class="fas fa-check mr-2"></i>Merci pour votre don !';
                submitButton.classList.add('success-animation');
                submitButton.style.background = 'linear-gradient(135deg, #10b981, #059669)';
                loadingSpinner.classList.add('hidden');

                // Redirection simulée
                setTimeout(() => {
                    console.log('Redirection vers la page de succès...');
                    // window.location.href = '/payment/success';
                }, 2000);
            }

            console.log('✅ Formulaire initialisé avec succès');
        });
    </script>
</body>
</html>
