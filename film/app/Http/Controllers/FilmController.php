<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Carbon\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Film::query();

        // Filtre
        if ($request->filter === 'recent') {
            // On affiche les films les plus récents (ex : mis en ligne dans les derniers 30 jours)
            $query->where('mise_en_ligne', '>=', now()->subDays(30));
        } elseif ($request->filter === 'top') {
            // Films avec une note haute, ici >= 8 par exemple
            $query->where('note', '>=', 8);
        }

        // Tri par note ? (par défaut desc)
        if ($request->has('sort') && $request->sort === 'note_asc') {
            $query->orderBy('note', 'asc');
        } else {
            // tri par défaut note desc
            $query->orderBy('note', 'desc');
        }

        // Filtre "récents"
        if ($request->has('filter') && $request->filter === 'recent') {
            $query->recent();
        }

        // Filtre "top rated"
        if ($request->has('filter') && $request->filter === 'top') {
            $query->topRated();
        }

        $films = $query->get();

        return view('welcome', compact('films'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('films.create', ['isCreatePage' => true]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'nom_auteur' => 'required|string|max:255',
            'mise_en_ligne' => 'required|date',
            'durer' => 'required',
            'note' => 'required|integer|min:0|max:10',
            'image' => 'nullable|image|max:2048',
        ]);

        // Convertit hh:mm en minutes (si besoin)
        $timeParts = explode(':', $request->durer);
        $dureeMinutes = ($timeParts[0] * 60) + $timeParts[1];

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            // Nom du fichier basé sur le nom du film
            $nomSanitize = Str::slug($validated['nom'], '_'); // ex: "Le Parrain" -> "le_parrain"
            $extension = $image->getClientOriginalExtension();
            $fileName = $nomSanitize . '_' . time() . '.' . $extension;

            // Stockage dans le dossier public/images
            $image->storeAs('images', $fileName, 'public');

            // Chemin sauvegardé en base
            $imagePath = $fileName;
        }


        Film::create([
            'nom' => $validated['nom'],
            'description' => $validated['description'],
            'nom_auteur' => $validated['nom_auteur'],
            'mise_en_ligne' => $validated['mise_en_ligne'],
            'durer' => $dureeMinutes,
            'note' => $validated['note'],
            'image' => $imagePath,
        ]);

        return redirect()->route('index')->with('success', 'Film ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
// FilmController.php
    public function show($id)
    {
        $film = Film::find($id);
        if (!$film) {
            abort(404, "Film non trouvé avec l'id $id");
        }
        $film->load('commentaires');
        return view('films.show', compact('film'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $film = Film::where('id', $id)->first();
        return view('films.edit', compact('film'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Film $film)
    {
        // Validation des données
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|string|max:255',
            'nom_auteur' => 'required|string|max:255',
            'mise_en_ligne' => 'required|date',
            'durer' => 'required|integer|min:1',
            'note' => 'required|integer|min:0|max:10',
        ]);

        $film->update($validated);

        return redirect()->route('films.show', $film->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {

        $film = Film::where('id', $id)->first();

        if ($film->image && file_exists(public_path("storage/images/{$film->image}"))) {
            @unlink(public_path("storage/images/{$film->image}"));
        }

        $film->delete();

        return redirect()->route('index')->with('success', 'Film supprimé avec succès.');
    }

}
