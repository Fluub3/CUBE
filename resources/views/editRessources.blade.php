@extends('layout.nav_bar')
@extends('layout.sidebar')
@section('content')
    <script src="https://cdn.tiny.cloud/1/cew72ljbtjkjbxfg29sq6tl3vzqbudslv5nwyme2ixdom1co/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'lists link image media',
            toolbar: 'undo redo | bold italic underline | forecolor backcolor | bullist numlist | link image media',
            menubar: false,
            width: '100%',
            height: 300,
        });
    </script>

    <div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Modifier la ressource
                    </div>
                    <div class="card-body">
                        <form action="{{ route('ressource.update', ['id' => $ressource->id]) }}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="titre">Titre de la ressource</label>
                                <input type="text" id="titre" name="Titre_ressource" value="{{ $ressource->Titre_ressource }}" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="contenu">Contenu de la ressource</label>
                                <textarea id="contenu" name="contenue" class="form-control" rows="5" required>{!! $ressource->Contenue !!}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
