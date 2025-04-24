<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <title>Connexion  |  Ehsan</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="icon" type="image/png" href="{{ asset('img/Ehsan_logo2.png') }}" sizes="18x18">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
    }
  </style>
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-indigo-100 p-4">

  <div class="w-full max-w-md">

    <!-- Logo -->
    <div class="flex justify-center mb-6">
      <div class="bg-white p-4 rounded-full shadow-lg transform hover:rotate-6 transition duration-300">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4" />
        </svg>
      </div>
    </div>

    <!-- Carte -->
    <div class="bg-white rounded-3xl shadow-2xl overflow-hidden transition hover:shadow-indigo-200">
      <div class="h-2 bg-gradient-to-r from-indigo-500 to-purple-600"></div>

      <div class="p-8">
        <div class="text-center mb-8">
          <img src="{{ asset('img/Ehsan_Logo.png') }}" alt="Logo" class="mx-auto w-20 mb-2">
          <h1 class="text-xl text-gray-700">Welcome back to <span class="text-indigo-600 font-semibold">Ehsan Plateform</span></h1>
          <h2 class="text-2xl font-bold text-gray-800 mt-1">Connexion</h2>
          <p class="text-sm text-gray-500 mt-1">Accédez à votre espace sécurisé</p>
        </div>

        <!-- Formulaire -->
        <form method="POST" action="/login" class="space-y-5">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          <!-- Email -->
          <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Adresse e-mail</label>
            <div class="relative">
              <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                  <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                </svg>
              </span>
              <input id="email" type="email" name="email" required
                class="pl-10 pr-4 py-3 w-full border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition"
                placeholder="votre@email.com"
                value="{{ old('email') }}">
            </div>
            <p class="text-sm text-red-600 mt-1">Adresse email invalide.</p>
          </div>

          <!-- Mot de passe -->
          <div>
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Mot de passe</label>
            <div class="relative">
              <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd"
                    d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                    clip-rule="evenodd" />
                </svg>
              </span>
              <input id="password" type="password" name="password" required
                class="pl-10 pr-4 py-3 w-full border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition"
                placeholder="••••••••">
            </div>
            <p class="text-sm text-red-600 mt-1">Mot de passe requis.</p>
          </div>

          <!-- Remember -->
          <div class="flex items-center justify-between text-sm">
            <label class="flex items-center">
              <input type="checkbox" name="remember" class="h-4 w-4 text-indigo-600 border-gray-300 rounded">
              <span class="ml-2 text-gray-700">Se souvenir de moi</span>
            </label>
            <a href="/forgot-password" class="text-indigo-600 hover:underline">Mot de passe oublié ?</a>
          </div>

          <!-- Bouton -->
          <div>
            <button type="submit"
              class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-3 px-4 rounded-lg font-semibold shadow-md transition transform hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Se connecter
            </button>
          </div>
        </form>

        <!-- Lien inscription -->
        <div class="mt-6 text-center text-sm text-gray-600">
          Pas encore de compte ?
          <a href="/register" class="text-indigo-600 font-medium hover:underline">Créer un compte</a>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <div class="mt-6 text-center text-xs text-gray-500">
      <p>© 2025 MyInfractions. Tous droits réservés.</p>
    </div>
  </div>

</body>
</html>
