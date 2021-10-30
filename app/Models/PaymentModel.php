<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentModel extends Model
{
    use HasFactory;
    protected $table = 'payments';
    public $timestamps = false;
    protected $fillable = [
        'purchase_id',
        'sale_id',
        'client_id',
        'type',
        'status',
        'date',
        'description',
        'debit_card',
        'credit_card',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
        'is_deleted',
        
    ];
}
