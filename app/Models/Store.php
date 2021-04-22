<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    
    // Relasi ke User
    public function user() {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Product
    public function products() {
        return $this->hasMany(Product::class);
    }

    // Relasi ke Category
    public function categories() {
        return $this->belongsToMany(Category::class);
    }
}
