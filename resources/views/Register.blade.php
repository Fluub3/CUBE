<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="{{ asset('css/globals.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>
<body>
@include('layout.header')
<main class="content-container">
    <div class="page-d-inscription">
        <div class="div">
            @if (session('error'))
                <div class="alert alert-error">
                    <ul>
                        {{ session('error') }}
                    </ul>
                </div>
            @endif
            <form id="registrationForm" class="form" method = "post" action = "/postUser">
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
                <div class="form-group">
                    <label>Sexe</label>
                    <input type="radio" id="monsieur" name="sexe" value="monsieur">
                    <label for="monsieur">Monsieur</label>
                    <input type="radio" id="madame" name="sexe" value="madame">
                    <label for="madame">Madame</label>
                </div>
                <div class="form-group">
                    <label for="dob">Votre date de naissance</label>
                    <input type="date" id="dob" name="dob" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="submit-button">
                        <div class="text-wrapper">S’inscrire</div>
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>
@include('layout.footer')
</body>
</html>
