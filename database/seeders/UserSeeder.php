<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Kevin Manceau',
            'email' => 'kevin.manceau@gmail.com',
            'password' => Hash::make('KevinManceau'),
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
        ]);
        User::create([
            'name' => 'Jean Claude',
            'email' => 'jean@claude.fr',
            'password' => Hash::make('JeanClaude'),
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
        ]);
    }
}
