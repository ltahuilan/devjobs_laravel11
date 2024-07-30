<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'attached_file',
        'user_id',
        'vacancy_id'
    ];

    /**
     * Relacionar tabla Candidates con Users
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
};