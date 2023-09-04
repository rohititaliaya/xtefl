<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class ProviderListing extends Model
{
    use HasFactory;

    public $fillable = [
        "reference_id",
        "provider_id",
        "campaign",
        "target_url",
        "utm",
        "recomm_title",
        "recomm_url",
        "same_as",
        "popular_title",
        "popular_url",
        "featured_title",
        "featured_url",
        "org_description",
        "org_url",
        "video_description",
        "youtube_url",
        "video_url",
        "status",
        "recomm_image",
        "popular_image",
        "featured_image",
        "org_image"
    ];

    public function provider()
    {
        return $this->hasOne(User::class, 'id', 'provider_id');
    }

    // protected function promotedImg(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn (string $value),
    //     );
    // }
}   
