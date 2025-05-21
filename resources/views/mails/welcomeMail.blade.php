<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienvenue sur Ehsan</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', Arial, sans-serif;
      background-color: #f5f7fa;
      margin: 0;
      padding: 0;
      color: #4a5568;
      line-height: 1.6;
    }
    .email-container {
      max-width: 600px;
      margin: 40px auto;
      background: white;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    }
    .header {
      background: linear-gradient(135deg, #16a34a 0%, #395443 100%);
      padding: 30px 20px;
      text-align: center;
    }
    .content {
      padding: 40px;
    }
    .footer {
      background-color: #f8fafc;
      padding: 20px;
      text-align: center;
      font-size: 13px;
      color: #64748b;
      border-top: 1px solid #e2e8f0;
    }
    h2 {
      color: #1e293b;
      font-size: 24px;
      font-weight: 600;
      margin-top: 0;
    }
    p {
      font-size: 16px;
      margin-bottom: 20px;
    }
    .btn-primary {
      background-color: #16a34a;
      color: white;
      text-decoration: none;
      padding: 14px 28px;
      border-radius: 8px;
      display: inline-block;
      font-weight: 500;
      transition: all 0.3s ease;
      box-shadow: 0 4px 6px rgba(22, 163, 74, 0.2);
    }
    .btn-primary:hover {
      background-color: #15803d;
      transform: translateY(-2px);
      box-shadow: 0 6px 12px rgba(22, 163, 74, 0.25);
    }
    .signature {
      color: #94a3b8;
      font-style: italic;
      margin-top: 30px;
    }
    .logo {
      height: 60px;
      width: auto;
    }
    .divider {
      height: 3px;
      background: linear-gradient(to right, #16a34a, #395443);
      margin: 25px 0;
      border-radius: 3px;
      opacity: 0.2;
    }
  </style>
</head>
<body>
  <div class="email-container">
    <!-- En-tête -->
    <div class="header">
      <img src="{{ asset('img/Ehsan_Logo2.png') }}" alt="Ehsan Logo" class="logo">
    </div>

    <!-- Contenu principal -->
    <div class="content">
      <h2>Bienvenue {{ $user->name }} !</h2>

      <p>Merci de rejoindre la communauté <strong>Ehsan</strong>, la plateforme qui crée des liens entre les donateurs et les associations caritatives.</p>

      <p>Votre inscription marque le début d'un voyage vers un impact social tangible. Nous sommes honorés de vous accompagner dans cette démarche généreuse.</p>

      <div class="divider"></div>

      <p style="text-align: center; font-weight: 500;">Prêt à faire la différence ?</p>

      <div style="text-align: center; margin: 30px 0;">
        <a href="{{ url('/') }}" class="btn-primary">
          Découvrir la plateforme
        </a>
      </div>

      <p class="signature">— L'équipe Ehsan</p>
    </div>

    <!-- Pied de page -->
    <div class="footer">
      <p>&copy; {{ date('Y') }} Ehsan. Tous droits réservés.</p>
      <p style="margin-top: 10px; font-size: 12px;">
        <a href="#" style="color: #64748b; text-decoration: none; margin: 0 10px;">Politique de confidentialité</a>
        <a href="#" style="color: #64748b; text-decoration: none; margin: 0 10px;">Conditions d'utilisation</a>
      </p>
    </div>
  </div>
</body>
</html>
