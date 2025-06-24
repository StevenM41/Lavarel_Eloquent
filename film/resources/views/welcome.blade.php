<x-layout>
    <div class="navbar">
        <h1>🎬 FavMovie</h1>
        <nav>
            <a href="/">Liste des films</a>
            <a href="/creation-de-vos-films">Créer vos films</a>
        </nav>
    </div>

    <form method="GET" action="{{ url()->current() }}" style="display: flex; flex-direction: row; justify-content: center; gap: 1rem; margin-bottom: .5rem;">
        <div style="display: flex; flex-direction: column">
            <label for="sort" style="white-space: nowrap;">Trier par note :</label>
            <select name="sort" id="sort" onchange="this.form.submit()" style="padding: 0.3rem 0.5rem;">
                <option value="note_desc" {{ request('sort') === 'note_desc' ? 'selected' : '' }}>Décroissant</option>
                <option value="note_asc" {{ request('sort') === 'note_asc' ? 'selected' : '' }}>Croissant</option>
            </select>
        </div>
        <div style="display: flex; flex-direction: column">
            <label for="filter" style="white-space: nowrap;">Filtrer :</label>
            <select name="filter" id="filter" onchange="this.form.submit()" style="padding: 0.3rem 0.5rem;">
                <option value="" {{ request('filter') === null ? 'selected' : '' }}>Aucun</option>
                <option value="recent" {{ request('filter') === 'recent' ? 'selected' : '' }}>Films récents</option>
                <option value="top" {{ request('filter') === 'top' ? 'selected' : '' }}>Les mieux notés</option>
            </select>
        </div>
    </form>


    <div class="film-grid">
        @foreach($films as $f)
            <a href="{{ route('films.show', $f->id) }}" style="text-decoration: none; color: inherit;">
                <div class="film-card">
                    <h2>{{ $f->nom }}</h2>
                    <img src="{{ asset('storage/images/'.$f->image) }}" alt="{{ $f->nom }}">
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
