<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model{

    public $timestamps = false;
    
    protected $table = "articles";

    protected $fillable = [
      'art_id',
      'art_name',
      'art_description',
      'art_price',
      'art_stock',
      'art_category',
      'art_model',
      'art_cover',
      'art_user_id'
    ];
}
