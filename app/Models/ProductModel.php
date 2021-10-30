<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;
    protected $table = 'products';
    public $timestamps = false;
    protected $fillable = [
        'product_name',
        'brand',
        'sale_rate',
        'purchase_rate',
        'created_at',
        'created_by',
        'update_at',
        'updated_by',
        'is_deleted',
        
    ];
}
