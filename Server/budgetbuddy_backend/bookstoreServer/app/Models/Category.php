<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Subcategory;

class Category extends Model
{
    protected $fillable = ['title', 'color'];

    public function subcategory(): HasMany{
        return $this->hasMany(Subcategory::class);
    }
}
