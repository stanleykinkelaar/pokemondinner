<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Card extends Model
{
    use HasFactory;

    protected $fillable = [
        'color',
        'dish_id',
        'active',
    ];

    public function dish(): HasOne
    {
        return $this->hasOne(Dish::class, 'id', 'dish_id');
    }
}
