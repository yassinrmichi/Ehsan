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
    <div class="w-full max-w-4xl bg-white rounded-3xl shadow-2xl overflow-hidden flex flex-col md:flex-row transition hover:shadow-indigo-200">

      <!-- Logo / Illustration -->
      <div class="md:w-1/2 bg-gradient-to-br from-indigo-500 to-purple-600 text-white p-8 flex items-center justify-center">
        <div class="text-center">
          <img src="{{ asset('img/Ehsan_Logo2.png') }}" alt="Logo Ehsan" class="w-28 mx-auto mb-4">
          <h2 class="text-2xl font-bold">Bienvenue sur</h2>
          <p class="text-lg font-medium mt-1">la plateforme <span class="italic">Ehsan</span></p>
        </div>
      </div>

      <!-- Formulaire -->
      <div class="md:w-1/2 p-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-1">Connexion</h2>
        <p class="text-sm text-gray-500 mb-6">Accédez à votre espace sécurisé</p>

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
  </body>

</html>
