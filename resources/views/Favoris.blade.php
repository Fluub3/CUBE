@extends('layout.nav_bar')
@section('title', 'Mes Favoris')
@extends('layout.sidebar')

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div>
        @if($favoris->isNotEmpty())
            @foreach($favoris as $ressource)
                <a href="{{ route('ressource.show', ['id' => $ressource->id]) }}" class="card ressource-preview">
                    <div class="card card-body">
                        <h3>{{ $ressource->Titre_ressource }}</h3>
                        <p>{!! substr($ressource->Contenue, 0, 100) !!}... </p>
                    </div>
                </a>
            @endforeach
        @else
            <p>Vous n'avez aucun favoris.</p>
        @endif
    </div>
@endsection
