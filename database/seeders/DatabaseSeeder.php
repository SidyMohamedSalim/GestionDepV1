<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Bureau;
use App\Models\Enseignant;
use App\Models\EnseignantVacataire;
use App\Models\Materiel;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\User::factory()->create([
            'name' => 'Zahi',
            'email' => 'a@gmail.com',
        ]);

        Enseignant::factory(50)->create();
        EnseignantVacataire::factory(50)->create();
        Bureau::factory(10)->create();



        Materiel::factory(20)->create([
            'categorie' => "Fourniture",
            'type' => "Informatique"
        ]);

        Materiel::factory(20)->create([
            'categorie' => "Fourniture",
            'type' => "Bureau"
        ]);


        Materiel::factory(20)->create([
            'categorie' => "Equipement",
            'type' => "Bureau"
        ]);

        Materiel::factory(20)->create([
            'categorie' => "Equipement",
            'type' => "Informatique"
        ]);
    }
}
