<?php

namespace Database\Seeders;

use App\Models\Candidat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CandidatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Candidat::create([
            'name' => 'Philippe Poutou',
            'age' => 57
        ]);
        Candidat::create([
            'name' => 'Olivier Besancenot',
            'age' => 50
        ]);
    }
}
