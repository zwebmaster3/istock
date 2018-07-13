<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    public $timestamps =  false;

    protected $table = "gallery";

    protected $fillable = [
      'gal_id',
      'gal_art_id',
      'gal_file',
      'gal_user_id'
    ];
}
