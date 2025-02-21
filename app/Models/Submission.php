<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;

    protected $fillable = [
        'submitted_at',
        'grade'
    ];

    /**
     * Relación con assignments.
     */
    public function assignment()
    {
        return $this->belongsTo(Assignment::class, 'assignment_id');
    }

    /**
     * Relación con el usuario (estudiante).
     */
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}
