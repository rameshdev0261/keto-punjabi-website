<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecipeTag extends Model
{
    protected $fillable = [
        'tag',
        'tag_id',
        'recipe_id',
    ];
}
