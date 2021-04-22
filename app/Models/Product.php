<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];


    // Relasi ke Store
    public function store() {
        return $this->belongsTo(Store::class);
    }

    // Relasi ke Category
    public function category() {
        return $this->hasOne(Category::class);
    }
}
