@extends('layout.nav_bar')
@extends('layout.sidebar')
@section('content')
    <div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>{{ $ressource->Titre_ressource }}</span>
                        @if(Auth::check() && $ressource->id_user == Auth::user()->id)
                            <div>
                                <button class="btn btn-outline-primary btn-star" data-ressource-id="{{ $ressource->id }}">
                                    <i class="far fa-star"></i>
                                </button>
                                <a href="{{ route('ressource.edit', ['id' => $ressource->id]) }}" class="btn btn-outline-secondary">Modifier</a>
                                <form action="{{ route('ressource.destroy', ['id' => $ressource->id]) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger">Supprimer</button>
                                </form>
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        {!! $ressource->Contenue !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
