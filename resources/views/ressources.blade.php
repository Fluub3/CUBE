@extends('layout.nav_bar')
@extends('layout.sidebar')
@section('content')
    <div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>{{ $ressource->Titre_ressource }}</span>
                        <button class="btn btn-outline-primary btn-star" data-ressource-id="{{ $ressource->id }}">
                            <i class="far fa-star"></i>
                        </button>
                    </div>
                    <div class="card-body">
                        {!! $ressource->Contenue !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



