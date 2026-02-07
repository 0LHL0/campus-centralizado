<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'body',
        'user_id'
    ];


    //Un mensaje pertence a un usuario
    public function User() {
        return $this->belongsTo(User::class);
    }
}
