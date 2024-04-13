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
        @forelse($ressources as $ressource) <!-- Si $ressources != empty alors tu affiche -->
            <a href="{{ route('ressource.show', ['id' => $ressource->id]) }}" class="card ressource-preview">

                <div class="card card-body">
                    <h3>{{ $ressource->Titre_ressource }}</h3> <!-- Affichez le titre de la ressource -->
                    <p>{!! substr($ressource->Contenue, 0, 100) !!}... </p> <!-- Affichez un aperçu du contenu -->
                </div>
            </a>
        @empty
            <!-- Aucune ressource trouvée -->
            <p>Aucune ressource disponible pour le moment.</p>
        @endforelse
    </div>
</div>

<!-- Plus de contenu principal -->
@endsection
