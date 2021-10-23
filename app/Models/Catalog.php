<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'image',
        'like',
        'tags_1',
        'tags_2',
        'tags_3',
    ];
}
