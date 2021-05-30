<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    protected $fillable = [
        'sku', 'product_id', 'quantity', 'price', 'profit', 'order_date'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }
}
