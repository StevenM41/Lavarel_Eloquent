<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'nom', 'description', 'nom_auteur', 'mise_en_ligne', 'durer', 'note', 'image',
    ];


    public function scopeOrderByNote($query, $direction = 'desc')
    {
        return $query->orderBy('note', $direction);
    }

    public function scopeRecent($query, $months = 12)
    {
        $dateLimite = now()->subMonths($months);
        return $query->where('mise_en_ligne', '>=', $dateLimite);
    }

    public function scopeTopRated($query, $minNote = 8)
    {
        return $query->where('note', '>=', $minNote);
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }

    // Méthode pour convertir les secondes en format H:i
    public function convertirDuree($secondes)
    {
        $heures = floor($secondes / 3600);
        $minutes = floor(($secondes % 3600) / 60);
        return sprintf("%02dh%02d", $heures, $minutes);
    }
}
