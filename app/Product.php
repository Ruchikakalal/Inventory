<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    //use SoftDeletes;

    protected $fillable = [
        'sku', 'title', 'quantity', 'selling_price', 'buying_price', 'parent_id'
    ];

    public function orders()
    {
        return $this->hasMany('App\orders');
    }
}
