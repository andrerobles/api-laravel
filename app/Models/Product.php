<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'description',
        'price',
        'total'
    ];
    
    protected $casts = [
        'price' => 'decimal:2',
        'total' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
}
