<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseModel extends Model
{
    use HasFactory;
    protected $table = 'purchase';
    public $timestamps = false;
    protected $fillable = [
        'product_id',
        'purchase_amount',
        'paid_amount',
        'date',
        'client_id',
        'serial_num',
        'engine_num',
        'is_sold',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
        'is_deleted',
        
    ];
}
