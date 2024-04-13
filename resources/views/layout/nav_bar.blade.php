<!-- resources/views/layout/nav_bar.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" /> <!-- Assurez-vous que ce chemin est correct -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" /> <!-- Assurez-vous que ce chemin est correct -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" /> <!-- Assurez-vous que ce chemin est correct -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-grid.css') }}" /> <!-- Assurez-vous que ce chemin est correct -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-reboot.css') }}" /> <!-- Assurez-vous que ce chemin est correct -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



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

    </script>

</head>
<body>
@include('layout.header')

<div class="sidebar">
    @yield('sidebar') <!-- Contenu de la sidebar -->
</div>

<div class="main-content">
    @yield('content') <!-- Contenu principal -->
</div>

@include('layout.footer')
</body>
</html>
