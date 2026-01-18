<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serve extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'key_features' => 'array',
    ];
}
