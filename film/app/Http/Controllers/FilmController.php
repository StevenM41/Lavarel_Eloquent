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
    public function index()
    {
        $films = Film::with('commentaires')->get();
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
    public function show($nom)
    {
        $f = Film::where('nom', ucwords(str_replace('_', " ", $nom)))->first();
        $film = Film::where('id',$f->id)->first();
        $film->load('commentaires'); // Charger les commentaires si besoin
        return view('films.show', compact('film'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Film $film)
    {

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

        return redirect()->route('films.show', $film)->with('success', 'Film mis à jour avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {

        $film = Film::where('id', $id)->first();

        if ($film->image && file_exists(public_path('storage/images/' . $film->image))) {
            unlink(public_path('storage/images/' . $film->image));
        }

        $film->delete();

        return redirect()->route('index')->with('success', 'Film supprimé avec succès.');
    }

}
