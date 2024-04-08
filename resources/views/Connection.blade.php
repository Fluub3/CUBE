<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Connexion</title>
    <link rel="stylesheet" href="/css/style.css" />
</head>
<body>
    <!-- Header -->
    <header class="header">
        Service-Public.fr
    </header>
    
    <!-- Main content container -->
    <main class="content-container">
        <!-- Login form -->
        <form id="loginForm" class="form" action="{{ route('login.post') }} " method="post">
            <!-- CSRF Token for security -->
            @csrf
            
            <div class="form-group">
                <label for="emailLogin">Votre email</label>
                <input type="email" id="emailLogin" name="email" required>
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
                <a href="/register">Créer un compte</a>
            </div>
        </form>
    </main>
</body>
</html>
