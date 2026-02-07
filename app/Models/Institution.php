<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
    ];

    //Una institucion tiene varios ciclos
    public function cycles() 
    {
        return $this->hasMany(Cycle::class);
    }


    //Una institucion tiene muchos usuarios
    public function users() {
        return $this->hasMany(User::class);
    }
}
