<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'is_read'
    ];

    /**
     * Relación con el enviador
     */
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    /**
     * Relación con el recibidor
     */
    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }
}
