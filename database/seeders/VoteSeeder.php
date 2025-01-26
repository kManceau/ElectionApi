<?php

namespace Database\Seeders;

use App\Models\Candidat;
use App\Models\Election;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $elections = Election::all();
        $candidats = Candidat::all();

        foreach ($users as $user) {
            foreach ($elections as $election) {
                $randomCandidat = $candidats->random();
                $existingVote = Vote::where('user_id', $user->id)
                    ->where('election_id', $election->id)
                    ->first();

                if (!$existingVote) {
                    Vote::factory()->create([
                        'user_id' => $user->id,
                        'election_id' => $election->id,
                        'candidat_id' => $randomCandidat->id,
                    ]);
                }
            }
        }
    }
}
