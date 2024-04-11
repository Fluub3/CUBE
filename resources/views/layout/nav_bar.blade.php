<!-- resources/views/layout/nav_bar.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" /> <!-- Assurez-vous que ce chemin est correct -->
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
