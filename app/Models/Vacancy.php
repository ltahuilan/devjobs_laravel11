<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
