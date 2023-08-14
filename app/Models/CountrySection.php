<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountrySection extends Model
{
    use HasFactory;

    public $fillable = ['category_id', 'country_id', 'country_title', 'country_content', 'country_order'];

    public function category() {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function country() {
        return $this->hasOne(Country::class, 'id', 'country_id');
    }
}
