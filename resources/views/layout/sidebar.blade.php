@section('sidebar') {{-- Ceci remplit la section sidebar de votre layout --}}
<!-- Ajoutez le contenu de la sidebar ici -->
<div class="menu-item"> <a href="{{ route('home') }}" class="menuA">Tableau de bord </a></div>

<!-- Afficher le lien "Ajouter une ressource" seulement si l'utilisateur est connecté -->
@auth
    <div class="menu-item"><a href="{{ route('favoris') }}" class="menuA">Mes favoris</a></div>
    <div class="menu-item"><a href="{{ route('editor') }}" class="menuA">Ajouter une ressource</a></div>
    @if(Auth::user()->Permission == 2)
    <div class="menu-item"><a href="{{ route('Administrateur') }}" class="menuA">Menu admin</a></div>
    @endif
    <!-- Afficher le bouton "Déconnexion" si l'utilisateur est connecté -->
    <div class="menu-item"><a href="{{ route('logout') }}" class="menuA" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Déconnexion</a></div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
@endauth
<!-- Afficher le bouton "Connexion" si l'utilisateur n'est pas connecté -->
@guest
    <div class="menu-item"><a href="/Connection" class="menuA">Connexion</a></div>
@endguest
<!-- Plus d'éléments du menu -->
@endsection
