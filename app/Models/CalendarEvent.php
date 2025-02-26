<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalendarEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'start',
        'end',
        'user_id',
    ];

    /**
     * Relación con los usuarios
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relación con las asistencias.
     */
    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'calendar_event_id');
    }
}
