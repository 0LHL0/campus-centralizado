<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'recipient_type',
        'grade',
        'sent_at'
    ];

    // Si el mensaje es por ciclo, tiene muchos ciclos vinculados
    public function cycles()
    {
        return $this->belongsToMany(Cycle::class);
    }
}
