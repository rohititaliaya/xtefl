<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    public $fillable = ['url_id', 'title', 'content', 'order'];
    
    public function url()
    {
        return $this->hasOne(Url::class, 'id', 'url_id');
    }
}
