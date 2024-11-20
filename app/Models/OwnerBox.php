<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OwnerBox extends Model
{
    use HasFactory;
    protected $fillable = [
        "owner_box_title",
        "owner_box_desc",
        "owner_box_image",
        "owner_name",
        "owner_sign",
    ];
}
