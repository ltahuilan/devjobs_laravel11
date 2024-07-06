<?php

namespace App\Livewire;

use App\Models\Vacancy;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class ShowVacancies extends Component
{
    use WithPagination;

    protected $listeners = ['deleteVacancy'];

    /**
     * El alias del evento se tiene que nombrar igual desde donde se emite
     * wire:click="$dispatch('prueba', {vacancy: {{ $vacancy->id }}} )"
     */

    public function deleteVacancy(Vacancy $vacancyId)
    {

        //Eliminar registro de la BD
        $vacancyId->delete();

        //Eliminar archivo asociado
        Storage::delete('public/vacancies/' . $vacancyId->file);

        // return redirect(request()->header('referer'));
    }

    public function render()
    {
        $vacancies = Vacancy::where('user_id', auth()->user()->id)->paginate(3);

        return view('livewire.show-vacancies', [
            'vacancies' => $vacancies
        ]);
    }
}
