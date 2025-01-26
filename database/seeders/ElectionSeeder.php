<?php

namespace Database\Seeders;

use App\Models\Election;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ElectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Election::create([
            'name' => '1er Tour des Législatives 2024',
            'start_date' => '2024-01-19',
            'end_date' => '2024-01-20',
        ]);
        Election::create([
            'name' => '2e Tour des Législatives 2024',
            'start_date' => '2024-01-26',
            'end_date' => '2024-01-27',
        ]);
        Election::factory(20)->create();
    }
}
