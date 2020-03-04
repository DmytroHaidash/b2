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
        'whom',
        'amount'
    ];

    public function product():HasOne
    {
        return $this->hasOne(Product::class);
    }

    public function status():HasOne
    {
        return $this->hasOne(Status::class);
    }
    public function supplier():HasOne
    {
        return $this->hasOne(Supplier::class);
    }
}
