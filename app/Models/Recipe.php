<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $table = 'recipes';   

    public $timestamps = false;    

    protected $fillable = [
        'title',
        'tagline',
        'description',
        'image',
        'meta',
        'ingredients',
        'steps',
    ];

    protected $casts = [
        'ingredients' => 'array',
        'steps' => 'array',
    ];
}
