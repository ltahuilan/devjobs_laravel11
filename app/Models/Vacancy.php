<?php

namespace App\Models;

use App\Models\User;
use App\Models\Salary;
use App\Models\Category;
use App\Models\Candidate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vacancy extends Model
{
    use HasFactory;

    //definir los campos que tendrán formato de fecha

    /**
     * Laravel 9
     * protected $dates = ['last_date']; 
     */

    /**
     * Laravel 10x, 11x...
     */
    protected $casts = ['last_date' => 'datetime'];

    protected $fillable = [
        'title',
        'salary_id',
        'category_id',
        'company',
        'last_date',
        'description',
        'file',
        'user_id'
    ];

    public function salary()
    {
        return $this->belongsTo(Salary::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Una vacante puede tener muchos canditados
     * on to many, uno a muchos
     */
    public function candidate()
    {
        return $this->hasMany(Candidate::class);
    }

    /**
     * Una vacante pertenece a un reclutador
     * belongs to
     */
    public function recruiter()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
