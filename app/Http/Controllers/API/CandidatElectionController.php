<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Candidat;
use App\Models\Election;

class CandidatElectionController extends Controller
{
    public function addCandidatToElection(Candidat $candidat, Election $election)
    {
        $candidat->elections()->attach($election);
        return response()->json('Candidat ajouté à l\'élection');
    }
}
