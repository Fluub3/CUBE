document.getElementById('btn-bold').addEventListener('click', function() {
    document.execCommand('bold');
});

document.getElementById('btn-italic').addEventListener('click', function() {
    document.execCommand('italic');
});

document.getElementById('btn-underline').addEventListener('click', function() {
    document.execCommand('underline');
});

// Afficher le sélecteur de couleur du texte
document.getElementById('btn-text-color').addEventListener('click', function() {
    document.getElementById('text-color-picker').click();
});

// Changer la couleur du texte
document.getElementById('text-color-picker').addEventListener('change', function(event) {
    var color = event.target.value;
    document.execCommand('foreColor', false, color);
});

// Afficher le sélecteur de couleur pour surligner le texte
document.getElementById('btn-highlight-color').addEventListener('click', function() {
    document.getElementById('highlight-color-picker').click();
});

// Changer la couleur de surlignage du texte
document.getElementById('highlight-color-picker').addEventListener('change', function(event) {
    var color = event.target.value;
    document.execCommand('hiliteColor', false, color);
});

// Fonction pour ajouter une image

// Fonction pour insérer une image à partir du fichier sélectionné

// Fonction pour insérer une image à partir du fichier sélectionné
function insertImage(file) {
    var reader = new FileReader();
    reader.onload = function(event) {
        var imgHtml = '<img src="' + event.target.result + '">';
        document.getElementById('editor-content').focus();
        document.execCommand('insertHTML', false, imgHtml);
    };
    reader.readAsDataURL(file);
}

// Gérer le changement de fichier sélectionné
document.getElementById('file-upload').addEventListener('change', function(event) {
    var file = event.target.files[0];
    if (file && file.type.match('image.*')) {
        insertImage(file);
    } else {
        alert("Veuillez sélectionner un fichier image.");
    }
});


// Fonction pour ajouter une vidéo
// Fonction pour ajouter une vidéo
function addVideo() {
    var videoUrl = prompt("Veuillez entrer l'URL de la vidéo youtube :");
    if (videoUrl) {
        // Extraire l'ID de la vidéo à partir de l'URL de partage YouTube
        var videoId = extractYouTubeVideoId(videoUrl);
        if (videoId) {
            var videoHtml = '<iframe width="560" height="315" src="https://www.youtube.com/embed/' + videoId + '" frameborder="0" allowfullscreen></iframe>';
            document.getElementById('editor-content').focus();
            document.execCommand('insertHTML', false, videoHtml);
        } else {
            alert("L'URL de la vidéo n'est pas valide.");
        }
    }
}

// Fonction pour extraire l'ID de la vidéo YouTube à partir de l'URL de partage
function extractYouTubeVideoId(url) {
    var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
    var match = url.match(regExp);
    if (match && match[2].length == 11) {
        return match[2];
    } else {
        return null;
    }
}



// Associer les fonctions aux boutons correspondants
document.getElementById('btn-video').addEventListener('click', addVideo);







document.getElementById('btn-Submit').addEventListener('click', function(event) {
    event.preventDefault();
    const editorContent = document.getElementById('editor-content');
    const editorContentInput = document.getElementById('editorContentInput');
    const selection = window.getSelection();
    const range = selection.getRangeAt(0);
    let formattedContent = editorContent.innerHTML;

    // Si la sélection contient un élément de tableau ou de liste
    if (selection.anchorNode.parentNode.nodeName === 'TD' || selection.anchorNode.parentNode.nodeName === 'LI') {
        const tag = selection.anchorNode.parentNode.nodeName.toLowerCase();
        const startTag = '<' + tag + '>';
        const endTag = '</' + tag + '>';
        formattedContent = formattedContent.substring(0, range.startOffset) + startTag +
                           formattedContent.substring(range.startOffset, range.endOffset) + endTag +
                           formattedContent.substring(range.endOffset);
    } else {
        formattedContent = formattedContent.replace(range.toString(), function(match) {
            if (selection.anchorNode.parentNode.nodeName === 'STRONG') {
                return '<strong>' + match + '</strong>';
            } else if (selection.anchorNode.parentNode.nodeName === 'EM') {
                return '<em>' + match + '</em>';
            } else {
                return '<p>' + match + '</p>';
            }
        });
    }


    editorContentInput.value = formattedContent;
    document.getElementById('Envoyer').click();
});

