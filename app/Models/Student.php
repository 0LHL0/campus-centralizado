<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'last_name',
        'classroom_id'
    ];

    //Cada estudiante pertenece a una clase 
    public function classroom(){
        return $this->belongsTo(Classroom::class);
    }
} 
