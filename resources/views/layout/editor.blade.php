<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Éditeur Personnalisé</title>
    <!-- Inclusion de votre feuille de style CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Inclure une bibliothèque d'icônes, par exemple Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<div class="container">
    <form id="editor-form">
        @csrf
        <div class="editor-container">
            <div class="toolbar">
                <button type="button" id="btn-bold"><i class="fas fa-bold"></i></button>
                <button type="button" id="btn-italic"><i class="fas fa-italic"></i></button>
                <button type="button" id="btn-underline"><i class="fas fa-underline"></i></button>
                <div class="color-picker-wrapper">
                    <button type="button" id="btn-text-color"><i class="fas fa-font"></i> Couleur</button>
                    <input type="color" id="text-color-picker" title="Couleur du texte">
                </div>
                <div class="color-picker-wrapper">
                    <button type="button" id="btn-highlight-color"><i class="fas fa-highlighter"></i> Surligner</button>
                    <input type="color" id="highlight-color-picker" title="Surligner le texte">

                </div><label for="file-upload" id="btn-insert-image" class="image-upload-btn"><i class="fas fa-image"></i></label>
                <input type="file" id="file-upload" accept="image/*" style="display: none;">
                <button type="button" id="btn-video"><i class="fas fa-video"></i></button>
                <!-- Ajoutez d'autres boutons selon vos besoins -->
            </div>
            <div id="editor-content" contenteditable="true" class="editor-content"></div>
        </div>
        <input type="submit">
    </form>
</div>

<!-- Inclusion de votre script JavaScript -->
<script src="{{ asset('js/app.js') }}"></script>
<script>

</script>
</body>
</html>
