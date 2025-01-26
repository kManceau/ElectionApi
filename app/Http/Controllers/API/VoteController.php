<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Candidat;
use App\Models\Election;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Support\Facades\DB;

class VoteController extends Controller
{
    public function addVote(User $user, Election $election, Candidat $candidat)
    {
        $existingVote = Vote::where('user_id', $user->id)
            ->where('election_id', $election->id)
            ->first();
        if ($existingVote) {
            return response()->json(['error' => 'Tu as déjà voté']);
        }
        $vote = new Vote();
        $vote->user_id = $user->id;
        $vote->election_id = $election->id;
        $vote->candidat_id = $candidat->id;
        $vote->save();
        $vote->load('election')->load('candidat')->load('user');
        return response()->json([
            'success' => 'Vote pris en compte !',
            'vote' => $vote
        ]);
    }

    public function getVote(Election $election)
    {
        $votes = Vote::where('election_id', $election->id)->get();
        $votes->load('election')->load('candidat')->load('user');
        return response()->json($votes);
    }

    public function getResults(Election $election)
    {
        $totalVotes = Vote::where('election_id', $election->id)->count();
        $results = Vote::where('election_id', $election->id)
            ->select('candidat_id', DB::raw('count(*) as total'))
            ->groupBy('candidat_id')
            ->get();
        $results->load('candidat');
        $results->transform(function ($result) use ($totalVotes) {
           $result->percentage = ($totalVotes > 0) ? ($result->total / $totalVotes) * 100 : 0;
           return $result;
        });
        return response()->json([
            $results,
        ]);
    }
}
