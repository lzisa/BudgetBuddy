<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subcategory extends Model
{
    protected $fillable = ['title', 'category_id'];
    public function category(): BelongsTo{
        return $this->belongsTo(Category::class);
    }

    public function transactions(): HasMany{
        return $this->hasMany(Transaction::class);
    }
}
