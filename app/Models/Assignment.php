<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'due_date',
        'subject_id',
        'assignment_id',
    ];

    /**
     * Relación con la materia
     */
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    /**
     * Relación con submissions
     */
    public function submissions()
    {
        return $this->hasMany(Submission::class, 'assignment_id');
    }
}
