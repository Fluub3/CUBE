@extends('layout.nav_bar')
@extends('layout.sidebar')
@section('content')

    @if(Auth::check() && Auth::user()->Permission == 2)
        <form action="{{ route('AdminChange') }}" method="post">
            @csrf
            <label for="user">Utilisateur:</label>
            <input list="userList" id="user" name="user">
            <datalist id="userList">
                <!-- Les options de la liste des utilisateurs seront générées ici -->
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->nom }} {{ $user->prenom }}</option>
                @endforeach
            </datalist>
            <br><br>
            <label for="permission">Permission:</label>
            <select id="permission" name="permission">
                <!-- Les options de permission seront ajoutées dynamiquement via JavaScript -->
                <option value="0">Utilisateur standard</option>
                <option value="1">Moderateur</option>
                <option value="2">Super-Admin</option>
            </select>
            <br><br>
            <input type="submit" value="Envoyer">
        </form>
    @else
        <p>Vous n'avez pas les permissions nécessaires pour accéder à cette page.</p>
    @endif


@endsection
