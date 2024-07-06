<?php

namespace App\Livewire;

use App\Models\Salary;
use Livewire\Component;
use App\Models\Category;
use App\Models\Vacancy;
use Livewire\WithFileUploads;

class CreateVacancy extends Component
{
    public $title;
    public $salary;
    public $category;
    public $company;
    public $last_date;
    public $description;
    public $file;

    protected $rules = [
        'title' => ['required', 'string'],
        'salary' => 'required',
        'category' => 'required',
        'company' => ['required', 'string'],
        'last_date' => 'required',
        'description' => ['required', 'string'],
        'file' => ['required', 'image', 'max:1024'],
    ];

    //habilitar la subida de archivos con livewire
    use WithFileUploads;

    public function create_vacancy()
    {
        $data = $this->validate();
        
        //get name file
        $image = $this->file->store('public/vacancies');
        $data['file'] = str_replace('public/vacancies/', '', $image);

        //store in DB
        Vacancy::create([
            'title' => $data['title'],
            'salary_id' => $data['salary'],
            'category_id' => $data['category'],
            'company' => $data['company'],
            'last_date' => $data['last_date'],
            'description' => $data['description'],
            'file' => $data['file'],
            'user_id' => auth()->user()->id
        ]);

        //show message
        session()->flash('status', 'La vacante se ha creado correctamente');

        //redirect
        return redirect()->route('vacancies.index');

    }

    public function render()
    {
        $salaries = Salary::all();
        $categories = Category::all();
        
        return view('livewire.create-vacancy', [
            'salaries' => $salaries,
            'categories' => $categories
        ]);
    }
}
