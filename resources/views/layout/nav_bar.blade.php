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
