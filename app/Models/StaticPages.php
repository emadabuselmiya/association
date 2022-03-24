<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaticPages extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'main_image', 'description', 'vision', 'message', 'objectives'];
}
