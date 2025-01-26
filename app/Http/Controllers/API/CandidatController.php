<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Candidat;
use Illuminate\Http\Request;

class CandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $candidats = Candidat::all();
        return response()->json($candidats);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required|string',
            'age' => 'required|integer',
        ]);
        $candidat = new Candidat();
        $candidat->fill($formFields);
        $candidat->save();
        return response()->json($candidat);
    }

    /**
     * Display the specified resource.
     */
    public function show(Candidat $candidat)
    {
        return response()->json($candidat);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Candidat $candidat)
    {
        $formFields = $request->validate([
            'name' => 'string',
            'age' => 'integer',
        ]);
        $candidat->update($formFields);
        return response()->json($candidat);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidat $candidat)
    {
        $candidat->delete();
        return response()->json(['success' => 'Candidat Supprimé.']);
    }
}
