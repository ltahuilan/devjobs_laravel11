<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\Vacancy;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class VacanciesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //En laravel 11 es necesario el uso de la clase Gate para acceder al policy
        //NO requiere instancia, se le pasa la clase
        Gate::authorize('viewAny', Vacancy::class);

        return view('vacancies.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //En laravel 11 es necesario el uso de la clase Gate para acceder al policy
        //NO requiere instancia, se le pasa la clase
        Gate::authorize('viewAny', Vacancy::class);
        
        return view('vacancies.create');
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
    public function show(Vacancy $vacancy)
    {
        //
        return view('vacancies.show', [
            'vacancy' => $vacancy
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacancy $vacancy)
    {
        //En laravel 11 es necesario el uso de la clase Gate para acceder al policy
        Gate::authorize('update', $vacancy);
        
        return view('vacancies.edit', [
            'vacancy' => $vacancy
        ]);
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
