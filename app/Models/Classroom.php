<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cycle_id'
    ];

    //Cada aula pertenece a un ciclo
    public function cycle() {
        return $this->belongsTo(Cycle::class);
    }

    //Un aula tiene muchos estudiantes
    public function students(){
        return $this->hasMany(Student::class);
    }
}
