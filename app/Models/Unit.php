<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Unit extends Model
{
    protected $fillable = [
        'property_id',
        'unit_code',
        'name',
        'floor',
        'bedrooms',
        'bathrooms',
        'area',
        'rent_amount',
        'sale_price',
        'status',
    ];

    protected $casts = [
        'bedrooms' => 'integer',
        'bathrooms' => 'integer',
        'area' => 'decimal:2',
        'rent_amount' => 'decimal:2',
        'sale_price' => 'decimal:2',
    ];

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

    public function listings(): HasMany
    {
        return $this->hasMany(Listing::class);
    }
}
