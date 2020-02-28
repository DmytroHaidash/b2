<?php

namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Accounting extends Model
{
    protected $fillable = [
        'product_id',
        'date',
        'status',
        'price',
        'message',
        'supplier',
        'whom'
    ];

    public function product():HasOne
    {
        return $this->hasOne(Product::class);
    }
}
