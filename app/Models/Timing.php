<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timing extends Model
{
    use HasFactory;

    public $fillable = ['name', 'slug' ,'category_id'];

    public function category() {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
