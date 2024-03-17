<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ShippingInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'country',
        'city',
        'state',
        'zipcode',
        'references',
        'latitud',
        'longitud',
    ];

    protected function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
