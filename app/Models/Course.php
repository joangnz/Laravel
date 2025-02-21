<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * Relación con los usuarios (estudiantes y profesores).
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'course_user', 'course_id', 'user_id')->withPivot('role');
    }

    /**
     * Relación con los eventos del calendario.
     */
    public function calendarEvents()
    {
        return $this->hasMany(CalendarEvent::class, 'course_id');
    }

    /**
     * Relación con las asignaturas (subjects).
     */
    public function subjects()
    {
        return $this->hasMany(Subject::class, 'course_id');
    }
}
