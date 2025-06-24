<x-layout>
    <div class="navbar">
        <h1>🎬 FavMovie</h1>
        <nav>
            <a href="/">Liste des films</a>
            <a href="/creation-de-vos-films">Créer vos films</a>
        </nav>
    </div>
    <div class="film-card" style="margin: 30px auto; max-width: 600px;">
        <h2>{{ $film->nom }}</h2>
        <img src="{{ asset('storage/images/' . $film->image) }}" alt="{{ $film->nom }}">
        <p><strong>Réalisé par :</strong> {{ $film->nom_auteur }}</p>
        <p>{{ $film->description }}</p>
        <p><strong>Note :</strong> {{ $film->note }}/10</p>
        <p><strong>Durée :</strong> {{ $film->convertirDuree($film->durer) }}</p>

        <div style="margin-top: 20px;">
            <a href="{{ route('films.edit', $film->id) }}">✏️ Modifier</a>
            <form action="{{ route('films.destroy', $film->id) }}" method="POST" onsubmit="return confirm('Supprimer ce film ?');">
                @csrf
                @method('DELETE')
                <button type="submit">Supprimer</button>
            </form>
        </div>

        <hr>

{{--        <h3>Ajouter un commentaire</h3>--}}
{{--        <form action="{{ route('commentaires.store') }}" method="POST">--}}
{{--            @csrf--}}
{{--            <input type="hidden" name="film_id" value="{{ $film->id }}">--}}
{{--            <input type="text" name="user_name" placeholder="Votre nom" required>--}}
{{--            <textarea name="commentaire" placeholder="Votre avis" required></textarea>--}}
{{--            <button type="submit">Poster</button>--}}
{{--        </form>--}}
{{--        */}}--}}

        <h3>Commentaires</h3>
        <ul>
            @foreach($film->commentaires as $comms)
                <li>
                    <strong>{{ $comms->user_name }}</strong>: {{ $comms->commentaire }}
                </li>
            @endforeach
        </ul>
    </div>
</x-layout>
