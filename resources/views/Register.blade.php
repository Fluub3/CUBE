<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Inscription</title>
    <link rel="stylesheet" href="/css/globals.css" />
    <link rel="stylesheet" href="/css/style.css" />
</head>
<body>
    <!-- Header -->
    @include('layout.header')
    
    <!-- Main content container -->
    <main class="content-container">
        <!-- Registration form -->
        <form id="registrationForm" class="registration-form" method="post" action="/postUser">
            <!-- CSRF Token for security -->
            @csrf
            
            <div class="form-group">
                <label for="lastName">Votre nom de famille</label>
                <input type="text" id="lastName" name="lastName" required>
            </div>
            
            <div class="form-group">
                <label for="firstName">Votre prénom</label>
                <input type="text" id="firstName" name="firstName" required>
            </div>
            
            <div class="form-group">
                <label for="email">Votre email personnel</label>
                <input type="email" id="email" name="email" required>
            </div>
            
            <div class="form-group">
                <label for="password">Votre mot de passe</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <div class="form-group">
                <label for="passwordConfirm">Confirmer le mot de passe</label>
                <input type="password" id="passwordConfirm" name="passwordConfirm" required>
            </div>
            
            <div class="form-group sexe">
    <input type="radio" id="monsieur" name="sexe" value="monsieur">
    <label for="monsieur">Monsieur</label>
    
    <input type="radio" id="madame" name="sexe" value="madame">
    <label for="madame">Madame</label>
</div>

            
            <div class="form-group">
                <label for="dob">Votre date de naissance</label>
                <input type="date" id="dob" name="dob" required>
            </div>
            
            <div class="form-group bouton-d-inscription">
                <button type="submit">S'inscrire</button>
            </div>
        </form>
    </main>
    @include('layout.footer')
</body>
</html>
