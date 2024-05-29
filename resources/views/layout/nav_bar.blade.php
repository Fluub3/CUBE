<!-- resources/views/layout/nav_bar.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" /> <!-- Assurez-vous que ce chemin est correct -->
    <link rel="stylesheet" href="{{ asset('css/commentaire.css') }}" /> <!-- Assurez-vous que ce chemin est correct -->
    <link rel="stylesheet" href="{{ asset('css/AddRessource.css.css') }}" /> <!-- Assurez-vous que ce chemin est correct -->
    <link rel="stylesheet" href="{{ asset('css/editor.css') }}" /> <!-- Assurez-vous que ce chemin est correct -->


    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" /> <!-- Assurez-vous que ce chemin est correct -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-grid.css') }}" /> <!-- Assurez-vous que ce chemin est correct -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-reboot.css') }}" /> <!-- Assurez-vous que ce chemin est correct -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/8c40c31b29.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tiny.cloud/1/cew72ljbtjkjbxfg29sq6tl3vzqbudslv5nwyme2ixdom1co/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>




    <script>
        // Fonction pour ajouter une ressource aux favoris
        function addToFavorites(ressourceId) {
            $.ajax({
                url: '{{ route("addtofavorites") }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    ressource_id: ressourceId
                },
                success: function(response) {
                    if($('#favoriteButton').hasClass('active')){
                        $('#favoriteButton').removeClass('active');
                    }else {
                        $('#favoriteButton').addClass('active');
                    }

                    alert(response.message);
                },
                error: function(xhr) {
                    alert('Une erreur s\'est produite lors de l\'ajout aux favoris');
                }
            });
        }



            function toggleReplyForm(commentaireId) {
            var replyForm = document.getElementById('replyForm' + commentaireId);
            if (replyForm.style.display === 'none') {
            replyForm.style.display = 'block';
        } else {
            replyForm.style.display = 'none';
        }
        }

        function toggleSidebar() {
            var sidebar = document.querySelector('.sidebar');
            sidebar.classList.remove('d-none');
        }

        function toggleSidebarClose() {
            var sidebar = document.querySelector('.sidebar');
            sidebar.classList.add('d-none');
        }

        // Fonction pour détecter la largeur de l'écran et appliquer la classe d-none en conséquence
        function toggleSidebarVisibility() {
            var sidebar = document.querySelector('.sidebar');
            var menutoggles = document.querySelectorAll('.menu-toggle');
            if (window.innerWidth <= 1000) {
                sidebar.classList.add('d-none');
                menutoggles.forEach(function(menutoggle) {
                    menutoggle.classList.remove('d-none');
                });
            } else {
                sidebar.classList.remove('d-none');
                menutoggles.forEach(function(menutoggle) {
                    menutoggle.classList.add('d-none');
                });
            }
        }


        // Appeler la fonction au chargement de la page et lors du redimensionnement de la fenêtre
        window.onload = toggleSidebarVisibility;
        window.onresize = toggleSidebarVisibility;




    </script>

</head>
<body>
@include('layout.header')
<!-- Ajoutez l'icône de menu -->

<div class="menu-toggle" onclick="toggleSidebar()">
    <i class="fa-solid fa-bars"></i>
    </i>
</div>
<div class="sidebar d-none">
    <div class="menu-toggle" onclick="toggleSidebarClose()">
        <i class="fa-solid fa-xmark"></i>

    </div>
    @yield('sidebar') <!-- Contenu de la sidebar -->
</div>

<div class="main-content">
    @yield('content') <!-- Contenu principal -->
</div>

@include('layout.footer')
</body>
</html>
