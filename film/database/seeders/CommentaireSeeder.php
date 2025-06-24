<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        // Insérer un commentaire après les films
        DB::table('commentaires')->insert([
            [
                'user_name' => 'Steven Mallochet',
                'commentaire' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...",
                'created_at' => now(),
                'edited_at' => now(),
                'film_id' => 2
            ],
            [
                'user_name' => 'Steven Mallochet',
                'commentaire' => 'Un film époustouflant avec une intrigue complexe mais fascinante.',
                'created_at' => now(),
                'edited_at' => now(),
                'film_id' => 2
            ],
            [
                'user_name' => 'Anna Dupuis',
                'commentaire' => 'Un classique indémodable, très émouvant et bien interprété.',
                'created_at' => now(),
                'edited_at' => now(),
                'film_id' => 4
            ],
            [
                'user_name' => 'Jean Testeur',
                'commentaire' => 'Un des meilleurs films de prison jamais réalisés.',
                'created_at' => now(),
                'edited_at' => now(),
                'film_id' => 7
            ]
        ]);
    }
}
