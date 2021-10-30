<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleModel extends Model
{
    use HasFactory;
    protected $table = 'sales';
    public $timestamps = false;
    protected $fillable = [
        'product_id',
        'client_id',
        'sale_amount',
        'frame_num',
        'no_of_installments',
        'rent_rate',
        'asal_installment',
        'date',
        'remaining_asal',
        'total_amount',
        'final_installment',
        'total_rent',
        'advance_amount',
        'advocate_name',
        'serial_num',
        'installment_amount',
        'engine_num',
        'witness_name_1',
        'witness_name_2',
        'witness_cnic_1',
        'witness_cnic_2',
        'file',
        'paid_amount',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
        'is_deleted',
        
    ];
}
