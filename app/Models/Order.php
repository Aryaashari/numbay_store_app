<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];


    // Relasi ke User
    public function user() {
        return $this->belongsTo(User::class);
    }


    // Relasi ke Product
    public function product() {
        return $this->belongsTo(Product::class);
    }
}
