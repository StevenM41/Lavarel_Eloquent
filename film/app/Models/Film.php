<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'nom', 'description', 'nom_auteur', 'mise_en_ligne', 'durer', 'note', 'image',
    ];


    public function getRouteKeyName()
    {
        return 'slug';
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
