<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;
    protected $fillable = [
        "title",
        "short_description",
        "video_link",
        "thumbnail",
        "difficulty",
        "diet_type",
        "category",
        "category_id",
        "prep_time",
    ];


    public function tags()
    {
        return $this->hasMany(RecipeTag::class);
    }
    public function nutritions()
    {
        return $this->hasMany(Nutrition::class);
    }

    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }

    public function directions()
    {
        return $this->hasMany(Direction::class);
    }
}
