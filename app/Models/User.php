<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'institution_id'
    ];

    // Oculta estos campos cuando se convierte a JSON
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Usuario pertenece a una institución
    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }

    // Usuario pertenece a un rol
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    // Verifica si el usuario tiene un rol específico
    // Uso: $user->hasRole('admin')
    public function hasRole(string $role): bool
    {
        return $this->role->name === $role;
    }
}
