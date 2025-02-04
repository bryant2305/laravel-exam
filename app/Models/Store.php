<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'merchant_id'];

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}

