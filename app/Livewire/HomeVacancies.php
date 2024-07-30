<?php

namespace App\Livewire;

use App\Models\Vacancy;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class HomeVacancies extends Component
{
    use WithPagination;
    
    public $termino;
    public $category;
    public $salary;

    #[On('search_terms')]
    public function termSearch($termino, $category, $salary)
    {
        $this->termino = $termino;
        $this->category = $category;
        $this->salary = $salary;
    }
    
    
    public function render()
    {

        // $vacancies = Vacancy::all();

        /**EJ 1 */
        // $vacancies = Vacancy::when($this, function($query) {
        //     $query->where('category_id', 'LIKE', $this->category);
        //     $query->where('salary_id', 'LIKE', $this->salary);
        //     $query->where('title', 'LIKE', '%' . $this->termino . '%');
        // })->when($this, function($query) {
        //     $query->where('category_id', 'LIKE', $this->category);
        //     $query->where('salary_id', 'LIKE', $this->salary);
        //     $query->where('company', 'LIKE', '%' . $this->termino .'%');
        // })->paginate(10);

        /**Ejemplo IA */
        // $users = User::when($role, function ($query, $role) {
        //     return $query->where('role', $role);
        // })->when($age, function ($query, $age) {
        //     return $query->where('age', '>', $age);
        // })->get();
         
        /**EJ 2 */
        $vacancies = Vacancy::where(function ($query) {
            $query->where('title', 'LIKE', "%" . $this->termino . "%")
            ->orWhere('company', 'LIKE', "%" . $this->termino . "%");
            })->when($this->category, function ($query) {
                $query->where('category_id', $this->category);
            })->when($this->salary, function ($query) {
                $query->where('salary_id', $this->salary);
            })->orderBy('created_at', 'DESC')->paginate(10);



        return view('livewire.home-vacancies', [
            'vacancies' => $vacancies
        ]);
    }
}
