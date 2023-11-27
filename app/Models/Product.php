<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'status'];

    public function book():BelongsTo
    {
        return $this->belongsTo(Book::class);
    }

    public function chapters():HasMany
    {
        return $this->hasMany(Chapter::class);
    }

    public function carts():HasMany
    {
        return $this->hasMany(Cart::class);
    }
}