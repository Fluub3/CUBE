<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
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
                <div class="form-group" >
                    <label>Sexe</label>
                    <div class="form-group" name="genre" style="display: inline-flex; align-items: center;">
                        <label for="monsieur" style="margin-right: 2em"><input type="radio" id="monsieur" name="sexe" value="monsieur" style="margin-right: 0.5em; vertical-align: middle;"> Monsieur </label>
                        <label for="madame"> <input type="radio" id="madame" name="sexe" value="madame" style="margin-right: 0.5em"> Madame</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="dob">Votre date de naissance</label>
                    <input type="date" id="dob" name="dob" required>
                </div>
                <div class="form-group">
                    <div class="form-links" style="float: right">
                        <a href="/Connection">Avez vous un compte ?</a>
                    </div>
                    <div class="form-group" style="padding-top: 3em">
                        <button type="submit" class="submit-button">
                            <div class="text-wrapper" name="inscription">S’inscrire</div>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
@include('layout.footer')
</body>
</html>
