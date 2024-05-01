<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleReceipts extends Model
{
    use HasFactory;

    protected $with = ['items'];

    public function items()
    {
        return $this->hasMany(SaleReceiptItems::class, 'receipt_id', 'id');
    }
}
