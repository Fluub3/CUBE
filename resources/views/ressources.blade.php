@extends('layout.nav_bar')
@extends('layout.sidebar')
@section('content')
    <div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>{{ $ressource->Titre_ressource }}</span>
                        @if(Auth::check())
                            <div>
                                <button class="btn btn-outline-primary btn-star" id="favoriteButton" data-ressource-id="{{ $ressource->id }}" onclick="addToFavorites({{ $ressource->id }})">
                                    <i class="far fa-star"></i>
                                </button>


                            @if($ressource->id_user == Auth::user()->id)
                                <a href="{{ route('ressource.edit', ['id' => $ressource->id]) }}" class="btn btn-outline-secondary">Modifier</a>
                                <form action="{{ route('ressource.destroy', ['id' => $ressource->id]) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger">Supprimer</button>
                                </form>
                                @endif
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


    <script>
        $(document).ready(function() {
            // Vérifier si la ressource est dans les favoris de l'utilisateur
            $.ajax({
                url: '{{ route("check.favorite", ["id" => $ressource->id]) }}',
                type: 'GET',
                success: function(response) {
                    if (response.isFavorite) {
                        $('#favoriteButton').addClass('active');
                        console.log('oui')
                    }else{
                        console.log('non');
                    }
                },
                error: function(xhr) {
                    console.error('Erreur lors de la vérification des favoris.');
                }
            });
        });
    </script>
@endsection
