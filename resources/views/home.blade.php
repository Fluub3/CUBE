@extends('layout.nav_bar') {{-- Assurez-vous que ce layout est le bon chemin --}}

@section('title', 'Accueil') {{-- Ceci définit le titre de la page --}}

@section('sidebar') {{-- Ceci remplit la section sidebar de votre layout --}}
<!-- Ajoutez le contenu de la sidebar ici -->
<div class="menu-item">Tableau de bord</div>
<div class="menu-item">Mes favoris</div>
<!-- Plus d'éléments du menu -->
@endsection

@section('content') {{-- Ceci remplit la section content de votre layout --}}
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<!-- Ici, commence le contenu principal de votre page d'accueil -->
<div class="card">
    <div class="card-header">
        Informations du compte ou autre contenu d'en-tête
    </div>
    <div class="card-body">
        Contenu principal de la page d'accueil, tableau de bord et statistiques
    </div>
</div>
<!-- Plus de contenu principal -->
@endsection
