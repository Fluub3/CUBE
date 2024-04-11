@extends('layout.nav_bar')
@extends('layout.sidebar')
@section('content')
    <div >
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $ressource->Titre_ressource }}</div>
                    <div class="card-body">
                        {!! $ressource->Contenue !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

