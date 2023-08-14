<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class ProviderListing extends Model
{
    use HasFactory;

    public $fillable = ['is_promoted','months'];

    public function provider()
    {
        return $this->hasOne(User::class, 'id', 'provider_id');
    }

    // protected function promotedImg(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn (string $value) => env('IMAGE_URL').'/public/uploads/'.$value,
    //     );
    // }
}   
