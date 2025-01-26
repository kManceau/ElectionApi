<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Election;
use Illuminate\Http\Request;

class ElectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $elections = Election::all();
        return response()->json($elections);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required|string',
            'start_date' => 'required|string',
            'end_date' => 'required|string',
        ]);
        $election = new Election();
        $election->name = $formFields['name'];
        $election->start_date = \DateTime::createFromFormat('d/m/Y', $formFields['start_date'])->format('Y-m-d');
        $election->end_date = \DateTime::createFromFormat('d/m/Y', $formFields['end_date'])->format('Y-m-d');
        $election->save();
        return response()->json($election);
    }

    /**
     * Display the specified resource.
     */
    public function show(Election $election)
    {
        return response()->json($election);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Election $election)
    {
        $formFields = $request->validate([
           'name' => 'string',
           'start_date' => 'string',
           'end_date' => 'string',
        ]);
        if(array_key_exists('name', $formFields)){
            $election->name = $formFields['name'];
        }
        if(array_key_exists('start_date', $formFields)){
            $election->start_date = \DateTime::createFromFormat('d/m/Y', $formFields['start_date'])->format('Y-m-d');
        }
        if(array_key_exists('end_date', $formFields)){
            $election->end_date = \DateTime::createFromFormat('d/m/Y', $formFields['end_date'])->format('Y-m-d');
        }
        $election->update();
        return response()->json($election);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Election $election)
    {
        $election->delete();
        return response()->json(['success' => 'Election supprimée.']);
    }
}
