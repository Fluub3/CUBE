<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Connexion</title>
    <link rel="stylesheet" href="/css/style.css" />
    <link rel="stylesheet" href="/css/app.css" />
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
    <form id="loginForm" class="form" action="{{ route('checkLogin') }}" method="post">
        <!-- CSRF Token for security -->
        @csrf

        <div class="form-group">
            <label for="emailLogin">Votre email</label>
            <input type="email" id="emailLogin" name="mail" required>
        </div>

        <div class="form-group">
            <label for="passwordLogin">Votre mot de passe</label>
            <input type="password" id="passwordLogin" name="password" required>
        </div>

        <div class="form-group">
            <button type="submit" class="submit-button">Se connecter</button>
        </div>

        <div class="form-links">
            <a href="/forgot-password">Mot de passe oublié ?</a>
            <a href="/Register">Créer un compte</a>
        </div>
    </form>
</main>
@include('layout.footer')
</body>
</html>
