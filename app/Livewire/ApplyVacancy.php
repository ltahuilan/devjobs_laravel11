<?php

namespace App\Livewire;

use App\Models\Candidate;
use App\Models\Vacancy;
use App\Notifications\NewCandidateNotification;
use Livewire\Component;
use Livewire\WithFileUploads;

class ApplyVacancy extends Component
{
    use WithFileUploads;

    public $attached_file;
    public $vacancy;

    protected $rules = [
        'attached_file' => ['required', 'mimes:pdf', 'max:1024']
    ];

    /**
     * El metodo mount se ejecuta cuando se renderiza la vista asociada
     */
    public function mount(Vacancy $vacancy)
    {
        $this->vacancy = $vacancy;
    }

    public function apply_vacancy()
    {
        //validar datos
        $data = $this->validate();
        
        //almacenar el archivo
        $file = $this->attached_file->store('public/attached');

        //extraer el nombre del archivo y almacenarlo en el atributo
        $data['attached_file'] = str_replace('public/attached/', '', $file);
        
        // dd( $this->vacancy->recruiter());

        //crear el registro del candidato
        Candidate::create([
            'attached_file' => $data['attached_file'],
            'user_id' => auth()->user()->id,
            'vacancy_id' => $this->vacancy->id,
        ]);

        //enviar email y notificacion
        $this->vacancy->recruiter->notify(new NewCandidateNotification($this->vacancy->id, $this->vacancy->title, auth()->user()->id) );

        //mostrar notificacion
        session()->flash('status', 'Te has postulado correctamente, mucha suerte!');

        return redirect()->back(); 

        /**
         * NOTADE SINTAXIS
         * $this->vacancy->recruiter() ... se accede a toda la informacion de la relación
         * $this->vacancy->recruiter ... se accede a la instancia del usuario
         */

    }

    public function render()
    {
        return view('livewire.apply-vacancy');
    }
}
