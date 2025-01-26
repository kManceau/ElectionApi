<?php

namespace Database\Seeders;

use App\Models\Candidat;
use App\Models\Election;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ElectionSeeder::class,
            CandidatSeeder::class,
        ]);
        User::factory(20)->create();
        Election::factory(20)->create();
        Candidat::factory(20)->create();
    }
}
