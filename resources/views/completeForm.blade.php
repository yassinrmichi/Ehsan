
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ehsan</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link rel="icon" type="image/png" href="{{ asset('img/Ehsan_logo2.png') }}" sizes="16x16
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome pour les icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #4f46e5, #7c3aed);
        --primary-hover: linear-gradient(135deg, #4338ca, #6d28d9);
        --dark-bg: linear-gradient(145deg, #1f2937, #111827);
        --card-bg: #1e1e2f;
        --text-light: #f3f4f6;
        --text-muted: #9ca3af;
        --input-bg: #2d2d44;
        --input-border: #4b5563;
        --focus-ring: 0 0 0 0.2rem rgba(99, 102, 241, 0.25);
    }

    body {
        font-family: 'Poppins', sans-serif;
        background: var(--dark-bg);
        color: var(--text-light);
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        line-height: 1.6;
    }

    .container {
        flex: 1;
        padding-bottom: 2rem;
        max-width: 800px;
    }

    .card {
        background-color: var(--card-bg);
        border: none;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    .card-header {
        background: var(--primary-gradient);
        padding: 1.75rem;
        border-bottom: none;
    }

    .card-header h4 {
        font-weight: 600;
        letter-spacing: 0.5px;
    }

    .form-label {
        color: var(--text-light) !important;
        font-weight: 500;
        margin-bottom: 0.5rem;
    }

    .text-muted {
        color: var(--text-muted) !important;
    }

    .form-control {
        background-color: var(--input-bg);
        border: 1px solid var(--input-border);
        color: var(--text-light);
        padding: 0.75rem 1rem 0.75rem 2.75rem;
        border-radius: 10px;
        transition: all 0.3s ease;
    }

    .form-control::placeholder {
        color: var(--text-muted);
        opacity: 0.7;
    }

    .form-control:focus {
        border-color: #818cf8;
        box-shadow: var(--focus-ring);
        background-color: var(--input-bg);
        color: var(--text-light);
    }

    .btn-primary {
        background: var(--primary-gradient);
        border: none;
        padding: 0.75rem;
        border-radius: 10px;
        font-weight: 600;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background: var(--primary-hover);
        transform: translateY(-1px);
    }

    .btn-primary:active {
        transform: translateY(0);
    }

    .input-icon {
        position: relative;
        margin-bottom: 1.5rem;
    }

    .input-icon i {
        position: absolute;
        left: 15px;
        top: 50px; /* Ajusté pour s'aligner avec le champ */
        color: var(--text-muted);
        transition: color 0.3s ease;
        z-index: 3; /* Assure que l'icône est au-dessus */
    }

    .input-icon .form-control {
        padding-left: 2.75rem; /* Espace suffisant pour l'icône */
        position: relative;
        z-index: 2;
    }

    /* Pour le textarea qui n'a pas d'icône */
    textarea.form-control {
        padding-left: 1rem !important;
    }



    .input-icon .form-control:focus + i {
        color: #818cf8;
    }

    .alert-info {
        background-color: rgba(79, 70, 229, 0.15);
        border: 1px solid rgba(99, 102, 241, 0.3);
        color: var(--text-light);
        border-radius: 12px;
        backdrop-filter: blur(5px);
    }



    .logo-container {
        margin-bottom: 2.5rem;
        transition: transform 0.3s ease;
    }

    .logo-container:hover {
        transform: scale(1.03);
    }

    .logo-container img {
        max-width: 180px;
        height: auto;
        filter: drop-shadow(0 4px 6px rgba(0, 0, 0, 0.1));
    }

    .footer {
        margin-top: 3rem;
        padding-top: 1.5rem;
        border-top: 1px solid rgba(255, 255, 255, 0.05);
    }

    .social-icons a {
        color: var(--text-muted);
        font-size: 1.1rem;
        margin: 0 0.75rem;
        transition: all 0.3s ease;
    }

    .social-icons a:hover {
        color: var(--text-light);
        transform: translateY(-2px);
    }

    .error-message {
        font-size: 0.85rem;
        margin-top: 0.25rem;
    }

    /* Animation */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .card {
        animation: fadeIn 0.5s ease-out;
    }
</style>

<div class="container mt-4 mt-md-5">
    <!-- Logo avec animation au hover -->
    <div class="logo-container text-center">
        <img src="{{ asset('img/Ehsan_logo2.png') }}" alt="Ehsan Logo" class="img-fluid">
    </div>

    <!-- Message d'information -->
    <div class="alert alert-info text-center shadow-sm mb-4" role="alert">
        <div class="d-flex align-items-center justify-content-center">
            <i class="fas fa-info-circle me-3" style="font-size: 1.5rem;"></i>
            <div>
                <strong>Veuillez remplir tous les champs correctement</strong>
                <p class="mb-0 mt-1">Ces informations sont essentielles pour valider votre inscription en tant qu'association sur notre plateforme.</p>
            </div>
        </div>
    </div>

    <!-- Formulaire -->
    <div class="card shadow-lg">
        <div class="card-header text-center text-white">
            <h4 class="mb-0"><i class="fas fa-users me-2"></i>Compléter le profil de l'association</h4>
        </div>
        <div class="card-body p-4 p-md-5">
            <form action="{{ route('associations.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Nom de l'association -->
                <div class="mb-4 input-icon">
                    <label for="nom" class="form-label">Nom de l'association</label>
                    <i class="fas fa-building"></i>
                    <input type="text" name="nom" id="nom" class="form-control"
                           value="{{ old('nom') }}" required
                           placeholder="Entrez le nom officiel de votre association">
                    @error('nom')
                        <div class="error-message text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Adresse -->
                <div class="mb-4 input-icon">
                    <label for="adresse" class="form-label">Adresse</label>
                    <i class="fas fa-map-marker-alt"></i>
                    <input type="text" name="adresse" id="adresse" class="form-control"
                           value="{{ old('adresse') }}"
                           placeholder="Adresse complète de l'association">
                    @error('adresse')
                        <div class="error-message text-danger">{{ $message }}</div>
                    @enderror
                </div>


                <!-- Ville -->
                <div class="mb-4 input-icon">
                    <label for="ville" class="form-label">Ville</label>
                    <i class="fas fa-city"></i>
                    <input type="text" name="ville" id="ville" class="form-control"
                           value="{{ old('ville') }}"
                           placeholder="Ville où est située l'association">
                    @error('ville')
                        <div class="error-message text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Description -->
                <div class="mb-4">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" rows="5" class="form-control"
                              placeholder="Décrivez en détail votre association : mission, objectifs, activités...">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="error-message text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Téléphone -->
                <div class="mb-4 input-icon">
                    <label for="telephone" class="form-label">Téléphone</label>
                    <i class="fas fa-phone"></i>
                    <input type="tel" name="telephone" id="telephone" class="form-control"
                           value="{{ old('telephone') }}"
                           placeholder="+33 6 12 34 56 78">
                    @error('telephone')
                        <div class="error-message text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Email -->
                <div class="mb-4 input-icon">
                    <label for="email" class="form-label">Email</label>
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" id="email" class="form-control"
                           value="{{ old('email') }}"
                           placeholder="votre_Email.@gmail.com">
                    @error('email')
                        <div class="error-message text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Code postal -->
                <div class="mb-4 input-icon">
                    <label for="code_postal" class="form-label">Code postal</label>
                    <i class="fas fa-mail-bulk"></i>
                    <input type="text" name="code_postal" id="code_postal" class="form-control"
                           value="{{ old('code_postal') }}"
                           placeholder="Entrez le code postal de votre association">
                    @error('code_postal')
                        <div class="error-message text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Site web -->
                <div class="mb-4 input-icon">
                    <label for="site_web" class="form-label">Site web</label>
                    <i class="fas fa-globe"></i>
                    <input type="url" name="site_web" id="site_web" class="form-control"
                           value="{{ old('site_web') }}"
                           placeholder="https://www.votre-association.org">
                    @error('site_web')
                        <div class="error-message text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Logo -->
                <div class="mb-4">
                    <label for="logo" class="form-label">
                        <i class="fas fa-image me-2"></i>Logo de l'association
                    </label>
                    <input type="file" name="logo" id="logo" class="form-control" accept="image/*">
                    <div class="form-text text-muted">Format recommandé : PNG ou JPG (max 2MB)</div>
                    @error('logo')
                        <div class="error-message text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Bouton de soumission -->
                <div class="text-center mt-4 pt-2">
                    <button type="submit" class="btn btn-primary px-5 py-2">
                        <i class="fas fa-save me-2"></i>Enregistrer le profil
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer text-center">
        <p class="mb-2 small">© 2025 Ehsan Platform. Tous droits réservés.</p>
        <div class="social-icons">
            <a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
            <a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
            <a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
            <a href="#" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
            <a href="#" title="YouTube"><i class="fab fa-youtube"></i></a>
        </div>
    </div>
</div>


