<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Provider extends Model
{
    protected $fillable = [
        'name',
        'is_used'
    ];

    public function cards(): HasMany
    {
        return $this->hasMany(Card::class, 'provider_id', 'id');
    }

    public function Sales(): HasManyThrough
    {
        return $this->hasManyThrough(
            Sale::class,
            Card::class,
            'provider_id',
            'card_id',
            'id'
        );
    }
}
