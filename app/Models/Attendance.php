<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'status'
    ];

    /**
     * Relación con el usuario (estudiante).
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relación con el evento del calendario.
     */
    public function calendarEvent()
    {
        return $this->belongsTo(CalendarEvent::class, 'calendar_event_id');
    }
}
