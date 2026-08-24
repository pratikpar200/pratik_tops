<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * Get the menu items (food items) for the restaurant.
     */
    public function menuItems(): HasMany
    {
        return $this->hasMany(FoodItem::class);
    }
}
