<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceImages extends Model
{
    use HasFactory;

    protected $appends = ['image_url'];
    public function getImageUrlAttribute()
    {
        return $this->url ? env('APP_URL') . $this->url : null;
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
