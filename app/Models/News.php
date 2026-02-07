<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content'
    ];

    //Noticias pueden pertenecer a varios ciclos

    public function cycles() {
        return $this->belongsToMany(Cycle::class, 'cycle_news');
    }
}
