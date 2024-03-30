<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Éditeur Personnalisé</title>
    <!-- Inclusion de votre feuille de style CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container">
    <form id="editor-form" action="{{ route('editor.save') }}" method="post">
        @csrf
        <div class="editor-container">
            <div class="toolbar">
                <button id="btn-bold">Gras</button>
                <button id="btn-italic">Italique</button>
                <!-- Ajoutez d'autres boutons selon vos besoins -->
            </div>
            <div id="editor-content" contenteditable="true" class="editor-content"></div>
        </div>
        <input type="submit">
    </form>
</div>

<!-- Inclusion de votre script JavaScript -->
<script src="{{ asset('js/app.js') }}"></script>


