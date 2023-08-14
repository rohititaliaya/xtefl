<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    public $fillable = [
        'provider_id',
        'type',
        'title',
        'image',
        'video_id',
        'tag',
        'description',
        'url'
    ];

    public function provider(){
        return $this->hasOne(User::class, 'id','provider_id');
    }
}
