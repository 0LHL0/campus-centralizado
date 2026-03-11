<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cycle extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'institution_id'
    ];

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }

    // Cambiamos a classrooms() plural para consistencia
    public function classrooms()
    {
        return $this->hasMany(Classroom::class);
    }

    public function news()
    {
        return $this->belongsToMany(News::class, 'cycle_news');
    }
}
