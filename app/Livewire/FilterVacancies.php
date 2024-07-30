<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Salary;

class FilterVacancies extends Component
{
    public $termino;
    public $category;
    public $salary;

    public function filter()
    {
        $this->dispatch('search_terms', termino: $this->termino, category: $this->category, salary: $this->salary);
    }

    public function render()
    {
        $categories = Category::all();
        $salaries = Salary::all();

        return view('livewire.filter-vacancies', [
            'categories' => $categories,
            'salaries' => $salaries
        ]);
    }
}
