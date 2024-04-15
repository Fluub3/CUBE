<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Éditeur Personnalisé</title>
    <!-- Inclusion de votre feuille de style CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Inclure une bibliothèque d'icônes, par exemple Font Awesome -->
    <script src="https://cdn.tiny.cloud/1/cew72ljbtjkjbxfg29sq6tl3vzqbudslv5nwyme2ixdom1co/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'lists link image media',
            toolbar: 'undo redo | bold italic underline | forecolor backcolor | bullist numlist | link image media',
            menubar: false,
            width: '100%',
            height: 300,
        });
    </script>
</head>
<body>
<div class="container">
    <form id="editor-form" method="post" action="/editor/save">
        @csrf
        <div class="editor-container">
            <!-- Barre d'outils de l'éditeur -->
            <div class="title-container">
                <label for="title">Titre :</label>
                <input type="text" name="title" id="title" placeholder="Entrez le titre ici" required>
            </div>

            <!-- Menu déroulant pour sélectionner la visibilité -->
            <div class="visibility-container">
                <label for="visibility">Visibilité :</label>
                <select name="visibility" id="visibility" required>
                    <option value="0" selected>Public</option>
                    <option value="1">Privé</option>
                    <option value="2">Non-repertorier</option>
                </select>
            </div>

            <!-- Zone d'édition du contenu -->
            <textarea id="contenu" name="contenue" class="form-control" rows="5"></textarea>
        </div>
        <!-- Bouton pour soumettre le formulaire -->
        <!-- Le vrai bouton de soumission qui sera caché -->
        <input type="submit" id="Envoyer">
    </form>


</div>
</body>
</html>
