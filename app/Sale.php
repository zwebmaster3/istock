<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model{

    protected $table = "sales";

    protected $fillable = [
        'sl_product',
        'sl_user',
        'sl_price',
        'sl_discount'
    ];
}
