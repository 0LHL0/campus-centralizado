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

    //Cada ciclo pertenece a una institucion 
    public function institution() {
        return $this->belongsTo(Institution::class);
    }

    //Un ciclo tiene muchas aulas
    public function classroom(){
        return $this->hasMany(Classroom::class);
    }

    //Un ciclo puede tener muchas noticias 
    public function news(){
        return $this->belongsToMany(News::class);
    }
}
