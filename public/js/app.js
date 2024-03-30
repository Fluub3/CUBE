document.getElementById('btn-bold').addEventListener('click', function() {
    document.execCommand('bold');
});

document.getElementById('btn-italic').addEventListener('click', function() {
    document.execCommand('italic');
});
/*
document.getElementById('editor-form').addEventListener('submit', function(event) {
    event.preventDefault();
    const editorContent = document.getElementById('editor-content');
    const formattedContent = editorContent.innerHTML.replace(/<[^>]*>/g, function(match) {
        if (match.includes('class="bold"')) {
            return '<strong>';
        } else if (match.includes('class="italic"')) {
            return '<em>';
        } else {
            return match;
        }
    }).replace(/<\/div>/g, function(match) {
        return '</strong></em></div>';
    });
    // Envoyez formattedContent à votre backend pour enregistrement en base de données
    console.log(formattedContent);
    // Vous pouvez ensuite soumettre le formulaire
    // document.getElementById('editor-form').submit();
});*/
