<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    protected $fillable = ['title', 'amount', 'subcategory_id', 'user_id'];


    public function spent($query){
        return $query->where('amount', '<', 0);
    }

    public function intake($query){
        return $query->where('amount', '>', 0);
    }

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function subcategory(): BelongsTo{
        return $this->belongsTo(Subcategory::class);
    }
}
