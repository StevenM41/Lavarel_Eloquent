<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
        {
            DB::table('films')->insert([
                [
                    'nom' => 'Inception',
                    'description' => 'Un voleur qui vole des secrets corporels par le biais de la technologie du partage de rêve est chargé de planter une idée dans l\'esprit d\'un PDG.',
                    'image' => 'inception.jpg',
                    'nom_auteur' => 'Christopher Nolan',
                    'mise_en_ligne' => '2010-07-16',
                    'durer' => 8880,
                    'note' => 2
                ],
                [
                    'nom' => 'The Shawshank Redemption',
                    'description' => 'Deux hommes emprisonnés se lient d\'amitié au fil des décennies, trouvant du réconfort et finalement du salut grâce à des actes de décence commune.',
                    'image' => 'shawshank.jpg',
                    'nom_auteur' => 'Frank Darabont',
                    'mise_en_ligne' => '1994-09-23',
                    'durer' => 8520,
                    'note' => 5
                ],
                [
                    'nom' => 'The Godfather',
                    'description' => 'Le patriarche vieillissant d\'une dynastie du crime organisé transfère le contrôle de son empire clandestin à son fils réticent.',
                    'image' => 'godfather.jpg',
                    'nom_auteur' => 'Francis Ford Coppola',
                    'mise_en_ligne' => '1972-03-15',
                    'durer' => 10560,
                    'note' => 9
                ],
                [
                    'nom' => 'The Dark Knight',
                    'description' => 'Lorsque la menace connue sous le nom du Joker émerge de son passé mystérieux, elle cause le chaos et la destruction dans les rues de Gotham.',
                    'image' => 'dark_knight.jpg',
                    'nom_auteur' => 'Christopher Nolan',
                    'mise_en_ligne' => '2008-07-18',
                    'durer' => 9120,
                    'note' => 10
                ],
                [
                    'nom' => 'Pulp Fiction',
                    'description' => 'Les vies de deux tueurs à gages, d\'un boxeur, d\'un gangster et de sa femme, et d\'un couple de bandits s\'entremêlent dans quatre histoires de violence et de rédemption.',
                    'image' => 'pulp_fiction.jpg',
                    'nom_auteur' => 'Quentin Tarantino',
                    'mise_en_ligne' => '1994-10-14',
                    'durer' => 9300,
                    'note' => 7
                ],
                [
                    'nom' => 'Fight Club',
                    'description' => 'Un employé de bureau insomniaque et un savonnier débridé forment un club de combat souterrain qui évolue en quelque chose de beaucoup plus.',
                    'image' => 'fight_club.jpg',
                    'nom_auteur' => 'David Fincher',
                    'mise_en_ligne' => '1999-10-15',
                    'durer' => 8100,
                    'note' => 8
                ],
                [
                    'nom' => 'Forrest Gump',
                    'description' => 'L\'histoire d\'un homme simple qui, avec seulement un QI de 75, accomplit de grandes choses dans sa vie et influence de nombreuses personnes.',
                    'image' => 'forrest_gump.jpg',
                    'nom_auteur' => 'Robert Zemeckis',
                    'mise_en_ligne' => '1994-07-06',
                    'durer' => 8520,
                    'note' => 8
                ],
                [
                    'nom' => 'The Matrix',
                    'description' => 'Un pirate informatique découvre que la réalité qu\'il connaît est une simulation créée par des machines intelligentes pour subjuguer l\'humanité.',
                    'image' => 'matrix.jpg',
                    'nom_auteur' => 'Lana Wachowski, Lilly Wachowski',
                    'mise_en_ligne' => '1999-03-31',
                    'durer' => 8100,
                    'note' => 3
                ],
                [
                    'nom' => 'Goodfellas',
                    'description' => 'L\'histoire de Henry Hill et de sa vie dans la mafia, couvrant près de trente ans de sa vie adulte.',
                    'image' => 'goodfellas.jpg',
                    'nom_auteur' => 'Martin Scorsese',
                    'mise_en_ligne' => '1990-09-19',
                    'durer' => 8580,
                    'note' => 8
                ],
                [
                    'nom' => 'The Silence of the Lambs',
                    'description' => 'Une jeune recrue du FBI doit recevoir l\'aide d\'un cannibale emprisonné et psychopathe pour attraper un autre tueur en série.',
                    'image' => 'silence_of_the_lambs.jpg',
                    'nom_auteur' => 'Jonathan Demme',
                    'mise_en_ligne' => '1991-02-14',
                    'durer' => 7020,
                    'note' => 0
                ]
            ]);
    }
}
