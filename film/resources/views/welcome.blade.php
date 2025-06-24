<x-layout>
    <div class="navbar">
        <h1>🎬 FavMovie</h1>
        <nav>
            <a href="/">Liste des films</a>
            <a href="/creation-de-vos-films">Créer vos films</a>
        </nav>
    </div>

    <div class="film-grid">
        @foreach($films as $f)
            <a href="{{ route('films.show', ['film' => strtolower(str_replace(' ', "_", $f->nom))]) }}" style="text-decoration: none; color: inherit;">
                <div class="film-card">
                    <h2>{{ $f->nom }}</h2>
                    <img src="{{ asset('storage/images/' . $f->image) }}" alt="{{ $f->nom }}">
                    <div class="film-info">
                        <p><strong>Réalisé par</strong> : {{ $f->nom_auteur }}</p>
                        <p>{{ $f->description }}</p>
                        <footer>{{ $f->note }}/10 - {{ $f->convertirDuree($f->durer) }}</footer>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</x-layout>
