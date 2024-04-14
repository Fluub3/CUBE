<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Connexion</title>
    <link rel="stylesheet" href="/css/style.css" />
</head>
<body>
<!-- Header -->
@include('layout.header')

<!-- Main content container -->
<main class="content-container">

    <!-- Affichage des erreurs de validation -->
    @if (session('error'))
        <div class="alert alert-error">
            <ul>
                {{ session('error') }}
            </ul>
        </div>
    @endif

    <!-- Login form -->
    <form id="loginForm" class="form" action="{{ route('Forgotpassword') }}" method="post">
        <!-- CSRF Token for security -->
        @csrf

        <div class="form-group">
            <label for="emailLogin">Votre email</label>
            <input type="email" id="emailLogin" name="mail" required>
        </div>

        <div class="form-group">
            <label for="passwordLogin">Votre nouveau mot de passe</label>
            <input type="password" id="passwordLogin" name="password" required>
        </div>

        <div class="form-group">
            <label for="passwordLogin">Confirmation du nouveau mot de passe</label>
            <input type="password" id="passwordLogin" name="passwordConfirm" required>
        </div>

        <div class="form-group">
            <button type="submit" class="submit-button">Changer son mot de passe</button>
        </div>

        <div class="form-links">
            <a href="/Connection">Se connecter</a>
            <a href="/Register">Créer un compte</a>
        </div>
    </form>
</main>
@include('layout.footer')
</body>
</html>
