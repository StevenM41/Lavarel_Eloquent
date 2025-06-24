<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commentaire;

class CommentaireController extends Controller
{
    public function store(Request $request)
    {
        // Validation simple des champs
        $validated = $request->validate([
            'film_id' => 'required|exists:films,id',
            'user_name' => 'required|string|max:255',
            'commentaire' => 'required|string|max:1000',
        ]);

        // Création du commentaire en base
        Commentaire::create([
            'film_id' => $validated['film_id'],
            'user_name' => $validated['user_name'],
            'commentaire' => $validated['commentaire'],
        ]);

        // Redirection vers la page du film avec un message succès
        return redirect()->route('films.show', $validated['film_id'])
            ->with('success', 'Votre commentaire a bien été ajouté !');
    }
}

