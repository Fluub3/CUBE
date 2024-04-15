@extends('layout.nav_bar') {{-- Assurez-vous que ce layout est le bon chemin --}}

@section('title', 'Accueil') {{-- Ceci définit le titre de la page --}}

@extends('layout.sidebar')


@section('content') {{-- Ceci remplit la section content de votre layout --}}
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<!-- Ici, commence le contenu principal de votre page d'accueil -->
<div>

    <div>
        <!-- Affichage de l'aperçu de chaque ressource -->
        @forelse($ressources as $ressource)
            @if($ressource->permission_ressource == 0 && !Auth::check())
                <!-- Pour les ressources publiques et les utilisateurs non connectés -->
                <a href="{{ route('ressource.show', ['id' => $ressource->id]) }}" class="card ressource-preview">
                    <div class="card card-body">
                        <h3>{{ $ressource->Titre_ressource }}</h3>
                        <p>{!! substr($ressource->Contenue, 0, 100) !!}... </p>
                    </div>
                </a>
            @elseif(Auth::check() && (($ressource->permission_ressource == 0 || $ressource->permission_ressource == 1) ||Auth::user()->Permission == 2||Auth::user()->Permission == 1))
                <!-- Pour les ressources publiques ou privées et les utilisateurs connectés -->
                <a href="{{ route('ressource.show', ['id' => $ressource->id]) }}" class="card ressource-preview">
                    <div class="card card-body">
                        <h3>{{ $ressource->Titre_ressource }}</h3>
                        <p>{!! substr($ressource->Contenue, 0, 100) !!}... </p>
                    </div>
                </a>
            @elseif(Auth::check() && (($ressource->permission_ressource == 2 && $ressource->id_user == Auth::id()) || Auth::user()->Permission == 2 || Auth::user()->Permission == 1))
                <!-- Pour les ressources non répertoriées et l'utilisateur connecté qui les a créées -->
                <a href="{{ route('ressource.show', ['id' => $ressource->id]) }}" class="card ressource-preview">
                    <div class="card card-body">
                        <h3>{{ $ressource->Titre_ressource }}</h3>
                        <p>{!! substr($ressource->Contenue, 0, 100) !!}... </p>
                    </div>
                </a>
            @endif
        @empty
            <!-- Aucune ressource trouvée -->
            <p>Aucune ressource disponible pour le moment.</p>
        @endforelse



    </div>
</div>

<!-- Plus de contenu principal -->
@endsection

@extends('layout.nav_bar')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Home</div>
                    <div class="card-body">
                        <p>You are in Home Page</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
