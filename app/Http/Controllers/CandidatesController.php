<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;

class CandidatesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Vacancy $vacancy)
    {
        /**
         * Consultar todos los candidatos relacionados a la vacante
         * $vacancy->candidate accede a todos los registros relacionados
         * $vacancy->candidate() accede a la instancia 
         */
        $candidates = $vacancy->candidate;

        return view('candidates.index', [
            'candidates' => $candidates,
            'vacancy' => $vacancy
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
