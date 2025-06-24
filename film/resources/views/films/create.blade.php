<x-layout>

    <form action="{{ route('films.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="title">Nom du film</label>
        <input id="title" name="nom" type="text" placeholder="Nom du film" required />

        <label for="desc">Description du film</label>
        <input id="desc" name="description" type="text" placeholder="Description du film" required />

        <label for="auteur">Nom de l'auteur</label>
        <input id="auteur" name="nom_auteur" type="text" placeholder="Nom de l'auteur" required />

        <label for="online">Date de mise en ligne</label>
        <input id="online" name="mise_en_ligne" type="date" required />

        <label for="time">Durée du film (hh:mm)</label>
        <input id="time" name="durer" type="time" required />

        <label for="note">Note du film</label>
        <input id="note" name="note" type="number" min="0" max="10" required />

        <label for="image">Image du film</label>
        <input id="image" name="image" type="file" accept="image/*" />

        <button type="submit">Enregistrer</button>
        <button type="button" onclick="window.location='{{ route('index') }}'">Annuler</button>
    </form>
</x-layout>
