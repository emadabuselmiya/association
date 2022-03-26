<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VedioAlbum extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'link'
    ];

    public function getIdYoutube()
    {
        parse_str(parse_url($this->link, PHP_URL_QUERY), $my_array_of_vars);
        return $my_array_of_vars['v'];
    }
}
