<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model{
    protected $table = "products";

    protected $fillable = [
    	'pd_name',
    	'pd_description',
    	'pd_price',
    	'pd_stock',
    	'pd_status'
    ];
}
