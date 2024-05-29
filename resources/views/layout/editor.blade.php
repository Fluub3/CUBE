@extends('layout.nav_bar')
@extends('layout.sidebar')
@section('content')
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

{{--</head>--}}
{{--<body>--}}
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
                    <option value="2">Non répertorié</option>
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
@endsection


