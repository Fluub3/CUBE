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
                                <button class="btn btn-outline-primary btn-star" id="favoriteButton"
                                        data-ressource-id="{{ $ressource->id }}"
                                        onclick="addToFavorites({{ $ressource->id }})">
                                    <i class="far fa-star"></i>
                                </button>
                                @if($ressource->id_user == Auth::user()->id || Auth::user()->Permission == 2 || Auth::user()->Permission == 1)
                                    @if($ressource->permission_ressource == 2)
                                        <div class="card-footer">
                                            <!-- Bouton pour générer le lien vers la ressource -->
                                            <button type="button" class="btn btn-outline-primary" id="generateLinkBtn">Générer un lien</button>
                                        </div>
                                    @endif



                                    <a href="{{ route('ressource.edit', ['id' => $ressource->id]) }}"
                                       class="btn btn-outline-secondary">Modifier</a>
                                    <form action="{{ route('ressource.destroy', ['id' => $ressource->id]) }}"
                                          method="POST" class="d-inline">
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
                <!-- Section pour les commentaires -->
                @if(Auth::check())
                    <div class="card mt-4">
                        <div class="card-header">Ajouter un commentaire</div>
                        <div class="card-body">
                            <form action="{{ route('comment.store', ['ressource_id' => $ressource->id]) }}"
                                  method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="comment">Commentaire :</label>
                                    <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </form>
                        </div>
                    </div>
                @endif
                <!-- Section pour afficher les commentaires -->
                <div class="card-body">
                    <!-- Vérifiez s'il y a des commentaires associés à cette ressource -->
                    @if($ressource->commentaires->isNotEmpty())
                        <h4>Commentaires :</h4>
                        <!-- Affichez les commentaires -->
                        @foreach($commentaires->sortByDesc('created_at') as $commentaire)
                            <div class="mb-3">
                                @isset($commentaire->user)
                                    <strong>{{ $commentaire->user->nom }} {{ $commentaire->user->prenom }}</strong> :
                                @endisset


                                <!-- Vérifie si l'utilisateur actuel est l'auteur du commentaire -->
                                @if(Auth::check() && ($commentaire->user_id === Auth::id()))
                                    <!-- Formulaire de modification -->
                                    <form action="{{ route('commentaire.update', $commentaire->id) }}" method="POST"
                                          style="display: inline;">
                                        @csrf
                                        @method('PUT')
                                        <textarea name="contenu" rows="3">{{ $commentaire->Contenue }}</textarea>
                                        <button type="submit">Modifier</button>
                                    </form>

                                    <!-- Formulaire de suppression -->
                                    <form action="{{ route('commentaire.destroy', $commentaire->id) }}" method="POST"
                                          style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?')">
                                            Supprimer
                                        </button>
                                    </form>
                                    @else



                                    <!-- Afficher le contenu du commentaire -->
                                    {{ $commentaire->Contenue }}

                                    <!-- Bouton "Répondre" -->
                                    @if(Auth::check())
                                        <button onclick="toggleReplyForm({{ $commentaire->id }})">Répondre</button>

                                        <!-- Formulaire de réponse (initiallement caché) -->
                                        <div id="replyForm{{ $commentaire->id }}" style="display: none;">
                                            <form action="{{ route('reponse_commentaire.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="commentaire_id"
                                                       value="{{ $commentaire->id }}">
                                                <textarea name="contenu" rows="3"
                                                          placeholder="Votre réponse"></textarea>
                                                <button type="submit">Répondre</button>
                                            </form>
                                        </div>
                                            @if(Auth::user()->Permission == 2 && Auth::check())
                                                <form action="{{ route('commentaire.destroy', $commentaire->id) }}" method="POST"
                                                      style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?')">
                                                        Supprimer
                                                    </button>
                                                </form>
                                            @endif
                                    @endif
                                @endif

                                <!-- Afficher les réponses à ce commentaire -->

                                @if($commentaire->reponses)
                                    <!-- Ajoutez cette ligne pour vérifier les données -->
                                    @foreach($commentaire->reponses->sortByDesc('created_at') as $reponse)
                                        <div class="ml-4">

                                            @isset($reponse->user)
                                                <strong>{{ $reponse->user->nom }} {{ $reponse->user->prenom }}</strong>
                                                :
                                            @endisset
                                            {{ $reponse->Contenue }}
                                        </div>
                                    @endforeach
                                @endif

                            </div>
                        @endforeach

                    @else
                        <!-- Affichez un message si aucun commentaire n'est disponible -->
                        <p>Aucun commentaire disponible pour cette ressource.</p>
                    @endif
                </div>


            </div>
        </div>
    </div>





    <script>
        $(document).ready(function () {
            // Vérifier si la ressource est dans les favoris de l'utilisateur
            $.ajax({
                url: '{{ route("check.favorite", ["id" => $ressource->id]) }}',
                type: 'GET',
                success: function (response) {
                    if (response.isFavorite) {
                        $('#favoriteButton').addClass('active');
                        console.log('oui')
                    } else {
                        console.log('non');
                    }
                },
                error: function (xhr) {
                    console.error('Erreur lors de la vérification des favoris.');
                }
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('generateLinkBtn').addEventListener('click', function () {
                // Envoyer une requête AJAX pour générer le lien
                $.ajax({
                    url: "{{ route('generate.link', ['id' => $ressource->id]) }}",
                    type: "POST",
                    data: {_token: "{{ csrf_token() }}"},
                    success: function (response) {

                        //console.log(response);
                        // Copier le lien généré dans le presse-papiers
                        copyToClipboard(response);
                    },
                    error: function (xhr, status, error) {
                        // Gérer les erreurs ici
                        console.error(error);
                    }
                });
            });

            // Fonction pour copier le texte dans le presse-papiers
            function copyToClipboard(text) {
                var textarea = document.createElement("textarea");
                textarea.value = text;
                document.body.appendChild(textarea);
                textarea.select();
                document.execCommand("copy");
                document.body.removeChild(textarea);

                // Afficher une alerte ou un message pour informer l'utilisateur que le lien a été copié
                alert('Le lien a été copié dans le presse-papiers : ' + text);
            }
        });
    </script>
@endsection
