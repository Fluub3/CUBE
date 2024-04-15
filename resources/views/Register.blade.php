<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8" />
     <link rel="stylesheet" href="{{ asset('css/globals.css') }}" />
     <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
 </head>
 <body>
    <div class="page-d-inscription">
    <div class="div">
        @if (session('error'))
            <div class="alert alert-error">
                <ul>
                    {{ session('error') }}
                </ul>
            </div>
        @endif
            <form id="registrationForm" method = "post" action = "/postUser">
                @csrf
                <div class="nom">
                    <label for="lastName">Votre nom de famille</label>
                    <input type="text" id="lastName" name="lastName" required>
                </div>
                <div class="prnom">
                    <label for="firstName">Votre prénom</label>
                    <input type="text" id="firstName" name="firstName" required>
                </div>
                <div class="email">
                    <label for="email">Votre email personnel</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="mot-de-passe">
                    <label for="password">Votre mot de passe</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="confirmation">
                    <label for="passwordConfirm">Confirmer le mot de passe</label>
                    <input type="password" id="passwordConfirm" name="passwordConfirm" required>
                </div>
                <div class="sexe">
                    <label>Sexe</label>
                    <input type="radio" id="monsieur" name="sexe" value="monsieur">
                    <label for="monsieur">Monsieur</label>
                    <input type="radio" id="madame" name="sexe" value="madame">
                    <label for="madame">Madame</label>
                </div>
                <div class="date-de-naissance">
                    <label for="dob">Votre date de naissance</label>
                    <input type="date" id="dob" name="dob" required>
                </div>
                <div class="bouton-d-inscription">
                    <button type="submit" class="overlap-group">
                        <div class="text-wrapper">S’inscrire</div>
                    </button>
                </div>
            </form>
        </div>
    </div>
 </body>
</html>