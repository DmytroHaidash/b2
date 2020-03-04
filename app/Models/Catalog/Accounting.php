<?php

namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Accounting extends Model
{
    protected $fillable = [
        'product_id',
        'date',
        'status_id',
        'price',
        'message',
        'supplier_id',
        'whom',
        'amount'
    ];

    public function product():BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function status():BelongsTo
    {
        return $this->belongsTo(Status::class);
    }
    public function supplier():BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }
}
