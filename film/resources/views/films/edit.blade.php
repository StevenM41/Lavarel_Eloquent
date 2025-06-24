<x-layout>
        <div style="max-width: 600px; margin: auto; padding: 20px; background: #f9f9f9; border-radius: 8px;">

            <h1 style="font-size: 24px; font-weight: bold; margin-bottom: 20px;">Modifier le film</h1>

            <form action="{{ route('films.update', $film->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div style="margin-bottom: 15px;">
                    <label for="nom" style="display: block; font-weight: bold; margin-bottom: 5px;">Nom du film</label>
                    <input type="text" id="nom" name="nom" value="{{ old('nom', $film->nom) }}"
                           required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                </div>

                <div style="margin-bottom: 15px;">
                    <label for="description" style="display: block; font-weight: bold; margin-bottom: 5px;">Description</label>
                    <textarea id="description" name="description" rows="4" required
                              style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">{{ old('description', $film->description) }}</textarea>
                </div>

                <div style="margin-bottom: 15px;">
                    <label for="image" style="display: block; font-weight: bold; margin-bottom: 5px;">URL de l'image (facultatif)</label>
                    <input type="text" id="image" name="image" value="{{ old('image', $film->image) }}"
                           style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                </div>

                <div style="margin-bottom: 15px;">
                    <label for="nom_auteur" style="display: block; font-weight: bold; margin-bottom: 5px;">Nom de l'auteur</label>
                    <input type="text" id="nom_auteur" name="nom_auteur" value="{{ old('nom_auteur', $film->nom_auteur) }}"
                           required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                </div>

                <div style="margin-bottom: 15px;">
                    <label for="mise_en_ligne" style="display: block; font-weight: bold; margin-bottom: 5px;">Date de mise en ligne</label>
                    <input type="date" id="mise_en_ligne" name="mise_en_ligne"
                           value="{{ old('mise_en_ligne', date('Y-m-d', strtotime($film->mise_en_ligne))) }}"
                           required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                </div>

                <div style="margin-bottom: 15px;">
                    <label for="durer" style="display: block; font-weight: bold; margin-bottom: 5px;">Durée (en minutes)</label>
                    <input type="number" id="durer" name="durer" value="{{ old('durer', $film->durer) }}"
                           required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                </div>

                <div style="margin-bottom: 20px;">
                    <label for="note" style="display: block; font-weight: bold; margin-bottom: 5px;">Note (/10)</label>
                    <input type="number" id="note" name="note" value="{{ old('note', $film->note) }}"
                           min="0" max="10" required
                           style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                </div>

                <div style="display: flex; gap: 10px;">
                    <button type="submit"
                            style="background-color: #007bff; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer;">
                        Mettre à jour
                    </button>
                    <a href="{{ route('films.show', $film->id) }}"
                       style="background-color: #6c757d; color: white; padding: 10px 15px; text-decoration: none; border-radius: 4px;">
                        Annuler
                    </a>
                </div>
            </form>
        </div>
</x-layout>
