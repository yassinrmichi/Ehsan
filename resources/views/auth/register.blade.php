<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscription | Plateforme Ehsan</title>
  <link rel="icon" type="image/png" href="{{ asset('img/Ehsan_logo2.png') }}" sizes="18x18">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: {
              50: '#f0f9ff',
              100: '#e0f2fe',
              500: '#6366f1',
              600: '#4f46e5',
              700: '#4338ca',
            },
            secondary: {
              500: '#8b5cf6',
              600: '#7c3aed',
            }
          },
          fontFamily: {
            sans: ['Inter', 'sans-serif'],
          },
        }
      }
    }
  </script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

    body {
      font-family: 'Inter', sans-serif;
    }

    .form-input-icon {
      position: relative;
    }

    .form-input-icon i {
      position: absolute;
      left: 16px;
      top: 42px;
      color: #9ca3af;
      transition: all 0.2s ease;
    }

    .form-input-icon input:focus + i {
      color: #6366f1;
    }

    .radio-card {
      transition: all 0.2s ease;
      border: 2px solid #e5e7eb;
    }

    .radio-card:hover {
      border-color: #c7d2fe;
    }

    .radio-card.selected {
      border-color: #6366f1;
      background-color: #f0f9ff;
    }

    .error-message {
      animation: fadeIn 0.3s ease-out;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-5px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-primary-50 to-indigo-50 p-4 md:p-8">
    <div class="w-full max-w-4xl mx-auto bg-white rounded-2xl shadow-xl overflow-hidden flex flex-col md:flex-row">
      <!-- Colonne Logo -->
      <div class="w-full md:w-1/2 flex items-center justify-center bg-gradient-to-br from-primary-100 to-secondary-100 p-6">
        <img src="{{ asset('img/Ehsan_Logo.png') }}" alt="Logo Ehsan" class="w-2/3 h-auto max-h-[300px] object-contain">
      </div>

      <!-- Colonne Formulaire -->
      <div class="w-full md:w-1/2 p-8">
        <div class="text-center mb-6">
          <h2 class="text-3xl font-bold text-gray-800 mb-1">Créer un compte</h2>
          <p class="text-gray-500">Rejoignez la communauté Ehsan et faites la différence</p>
        </div>
        @if (session('error'))
        <div class="error-message mb-4">
          <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Erreur !</strong>
            <span class="block sm:inline">{{ session('error') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
              <i class="fas fa-times text-red-500"></i>
            </span>
          </div>
        </div>
      @endif



        <!-- Formulaire -->
        <form method="POST" action="/register" class="space-y-5">
          @csrf

          <!-- Nom complet -->
          <div class="form-input-icon">
            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nom complet</label>
            <i class="fas fa-user"></i>
            <input id="name" type="text" name="name" required
                   class="block w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition duration-200"
                   placeholder="Jean Dupont"
                   value="{{ old('name') }}">
          </div>

          <!-- Email -->
          <div class="form-input-icon">
            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Adresse e-mail</label>
            <i class="fas fa-envelope"></i>
            <input id="email" type="email" name="email" required
                   class="block w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition duration-200"
                   placeholder="jean@exemple.com"
                   value="{{ old('email') }}">
          </div>

          <!-- Type de rôle -->
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-3">Je suis</label>
            <div class="grid grid-cols-2 gap-4">
              <label class="radio-card rounded-lg p-4 cursor-pointer">
                <input type="radio" name="role" value="donateur" required class="sr-only peer">
                <div class="flex flex-col items-center">
                  <div class="w-10 h-10 rounded-full bg-primary-50 flex items-center justify-center mb-2">
                    <i class="fas fa-hand-holding-heart text-primary-600 text-lg"></i>
                  </div>
                  <span class="text-sm font-medium text-gray-700">Donateur</span>
                </div>
              </label>

              <label class="radio-card rounded-lg p-4 cursor-pointer">
                <input type="radio" name="role" value="association" required class="sr-only peer">
                <div class="flex flex-col items-center">
                  <div class="w-10 h-10 rounded-full bg-primary-50 flex items-center justify-center mb-2">
                    <i class="fas fa-users text-primary-600 text-lg"></i>
                  </div>
                  <span class="text-sm font-medium text-gray-700">Association</span>
                </div>
              </label>
            </div>
          </div>

          <!-- Mot de passe -->
          <div class="form-input-icon">
            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Mot de passe</label>
            <i class="fas fa-lock"></i>
            <input id="password" type="password" name="password" required
                   class="block w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition duration-200"
                   placeholder="••••••••">
          </div>

          <!-- Confirmation mot de passe -->
          <div class="form-input-icon">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirmez le mot de passe</label>
            <i class="fas fa-lock"></i>
            <input id="password_confirmation" type="password" name="password_confirmation" required
                   class="block w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition duration-200"
                   placeholder="••••••••">
          </div>

          <!-- Bouton d'inscription -->
          <div class="pt-2">
            <button type="submit"
                    class="w-full flex justify-center items-center gap-3 py-3.5 px-4 border border-transparent rounded-lg shadow-sm text-base font-medium text-white bg-gradient-to-r from-primary-600 to-secondary-600 hover:from-primary-700 hover:to-secondary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition duration-200 transform hover:-translate-y-0.5 active:translate-y-0">
              <i class="fas fa-user-plus text-lg"></i>
              Créer mon compte
            </button>
          </div>
        </form>

        <!-- Lien de connexion -->
        <div class="mt-6 text-center">
          <p class="text-sm text-gray-600">
            Vous avez déjà un compte ?
            <a href="/login" class="font-medium text-primary-600 hover:text-primary-500 hover:underline transition duration-200">
              Connectez-vous ici
            </a>
          </p>
        </div>
      </div>
    </div>







  <script>
    // Animation pour les cartes radio
    document.querySelectorAll('.radio-card').forEach(card => {
      const radio = card.querySelector('input[type="radio"]');

      radio.addEventListener('change', () => {
        document.querySelectorAll('.radio-card').forEach(c => {
          c.classList.remove('selected');
        });
        if (radio.checked) {
          card.classList.add('selected');
        }
      });
    });
  </script>
</body>
</html>
