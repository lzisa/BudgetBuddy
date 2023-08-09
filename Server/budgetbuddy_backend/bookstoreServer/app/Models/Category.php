<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    protected $fillable = ['title', 'color', 'user_id'];

    public function subcategory(): HasMany{
        return $this->hasMany(Subcategory::class);
    }

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
