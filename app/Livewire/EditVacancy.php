<?php

namespace App\Livewire;

use App\Models\Salary;
use App\Models\Vacancy;
use Livewire\Component;
use App\Models\Category; 
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

use function Psy\debug;

class EditVacancy extends Component
{
    public $id;
    public $title;
    public $salary;
    public $category;
    public $company;
    public $last_date;
    public $description;
    public $file;
    public $new_file;

    use WithFileUploads;

    protected $rules = [
        'title' => ['required', 'string'],
        'salary' => 'required',
        'category' => 'required',
        'company' => ['required', 'string'],
        'last_date' => 'required',
        'description' => ['required', 'string'],
        'new_file' => ['nullable', 'image', 'max:1024']
    ];

    /**
     * Lifecycle Hook
     * Runs once, immediately after the component is instantiated, but before render() is called.
     * This is only called once on initial page load and never called again, even on component refreshes
     * 
     * Para pasar los datos un registro hacia un formulario
     */
    public function mount(Vacancy $vacancy)
    {
        foreach($vacancy->getAttributes() as $key => $value) {
            if(property_exists($this, $key)) {

                //$this->key === $title, $salary, etc...
                $this->$key = $value;
            }
        };

        // $this->title = $vacancy->title;
        // $this->company = $vacancy->company;
        // $this->description = $vacancy->description;
        $this->salary = $vacancy->salary_id;
        $this->category = $vacancy->category_id;
        $this->last_date = Carbon::parse($vacancy->last_date)->format('Y-m-d');
    }

    public function edit_vacancy()
    {

        //validar la entrada de datos
        $data = $this->validate();
        
        //verificar si hay una nueva imagen
        if($this->new_file) {
            $image = $this->new_file->store('public/vacancies');
            $data['file'] = str_replace('public/vacancies/', '', $image);
        }
        
        //encontrar el registro a editar
        $vacancy = Vacancy::find($this->id);
        
        $old_file = $vacancy->file;

        //borrar imagen anterior
        if($this->new_file) {
            Storage::delete('public/vacancies/' . $old_file);
        }

        //Asiganr los nuevos valores
        $vacancy->title = $data['title'];
        $vacancy->salary_id = $data['salary'];
        $vacancy->category_id = $data['category'];
        $vacancy->company = $data['company'];
        $vacancy->last_date = $data['last_date'];
        $vacancy->description = $data['description'];
        $vacancy->file = $data['file'] ?? $vacancy->file;

        // Storage::delete('storage/app/public/vacancies/' . $old_file);

        //Guardar los cambios
        $vacancy->save();

        //Redireccionar y mostrar mensaje
        session()->flash('status', 'La vacante <span class="font-extrabold">' . $vacancy->title . '</span> se actualizó correctamente');

        return redirect()->route('vacancies.index');
    }


    public function render()
    {
        $salaries = Salary::all();
        $categories = Category::all();

        return view('livewire.edit-vacancy', [
            'salaries' => $salaries,
            'categories' => $categories
        ]);
    }
}
