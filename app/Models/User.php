<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'institution_id'
    ];

    //Usuario pertenece a una institucion
    public function institution() {
        return $this->belongsTo(Institution::class);
    }

    //Usuario pertenece un rol
    public function role() {
        return $this->belongsTo(Role::class);
    }
}
