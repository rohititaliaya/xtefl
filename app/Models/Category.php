<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $fillable = ['name', 'slug', 'ctitle', 'short_desc'];

    public function sections()
    {
        // get all sections from categorysection table, where category id
        return $this->hasMany(CategorySection::class, 'category_id', 'id')->orderBy('order', 'asc');
    }    
}
