<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramContent extends Model
{
    use HasFactory;

    public $fillable = ['pcategory_id', 'title', 'content', 'order'];

    public function pcategory() {
        return $this->hasOne(ProgramCategory::class, 'id', 'pcategory_id')->with(['category','programtype']);
    }

    // public function category()
    // {
    //     return $this->hasManyThrough(
    //         ProgramCategory::class,
    //         Category::class,
    //         'id', // Foreign key on the category table...
    //         'category_id', // Foreign key on the Pcategory table...
    //         'pcategory_id', // Local key on the pcontent table...
    //         'id' // Local key on the environments table...
    //     );
    // }

}
