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
    public function mount(Vacancy $vacancy, Candidate $candidate)
    {
        $this->vacancy = $vacancy;


        // $candidates = $vacancy->candidate;
        
        // foreach ($candidates as $candidate) {

        //     if($this->vacancy->id == $candidate->vacancy_id && $candidate->user_id == auth()->user()->id) {
        //         session()->flash('error', 'Ya has aplicado a esta vacante el ' . $candidate->created_at->format('d-M-Y'));
        //     }
        // }

        /**
         * con la relacion candidate
         */

        if( $vacancy->candidate->where('user_id', auth()->user()->id )->count() > 0 ) {

            $candidate = $vacancy->candidate->where('user_id', auth()->user()->id);

            session()->flash('error', 'Ya has aplicado a esta vacante el ' . $candidate[0]['created_at']->format('d-M-Y'));
        }
    }

    public function apply_vacancy()
    {
        
        //validar datos 
        $data = $this->validate();

        /**
         * verificar si el usuario autenticado se ha postulado para prevenir duplicados
         * busca la relacion entre vacancy-candidate y cuenta los registros
         * si es igual a cero, no esta posta postulado y crea el registro
         * si es mayor a cero, ya se postulo, no ejecuta nada o muestra mensaje
         * ayuda a prevenir duplicidad de registros
         */
        if( $this->vacancy->candidate->where('user_id', auth()->user()->id )->count() === 0) {

            //almacenar el archivo
            $file = $this->attached_file->store('public/attached');
    
            // dd( $this->attached_file );
    
            //extraer el nombre del archivo y almacenarlo en el atributo
            $data['attached_file'] = str_replace('public/attached/', '', $file);
            
            
            //crear el registro del candidato
            Candidate::create([
                'attached_file' => $data['attached_file'],
                'user_id' => auth()->user()->id,
                'vacancy_id' => $this->vacancy->id,
            ]);
    
            //enviar email y notificacion
            $this->vacancy->recruiter->notify(new NewCandidateNotification($this->vacancy->id, $this->vacancy->title, auth()->user()->id) );
    
            //crear mensaje flash
            session()->flash('status', 'Te has postulado correctamente, mucha suerte!');
    
            return redirect()->back(); 
        }



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
