<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    public $timestamps = false;

    protected $fillable = ['user_name', 'commentaire', 'film_id'];

    public function film()
    {
        return $this->belongsTo(Film::class);
    }
}
