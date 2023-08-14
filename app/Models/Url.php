<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;

    public function sections()
    {
        return $this->hasMany(Content::class, 'url_id', 'id')->OrderBy('order','asc');
    }
}
