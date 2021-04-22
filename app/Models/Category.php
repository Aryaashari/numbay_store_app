<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['kategori'];


    // Relasi ke Product
    public function product() {
        return $this->belongsTo(Product::class);
    }

    // Relasi ke Store
    public function stores() {
        return $this->belongsToMany(Store::class);
    }
}
