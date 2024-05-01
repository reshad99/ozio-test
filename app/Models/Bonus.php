<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Bonus extends Model
{
    use HasFactory;
    protected $table = 'bonus';
    protected $with = ['user', 'saleReceipts'];

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'bonus_card_no', 'cardno');
    }

    public function saleReceipts(): HasMany
    {
        return $this->hasMany(SaleReceipts::class, 'cardno', 'cardno');
    }
}
