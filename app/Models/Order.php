<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    protected function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected function payment(): BelongsTo
    {
        return $this->belongsTo(Payment::class);
    }

    protected function shippingInfo(): BelongsTo
    {
        return $this->belongsTo(ShippingInfo::class);
    }
}
