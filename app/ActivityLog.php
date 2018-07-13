<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $table = "activity_log";

    protected $fillable = [
      'log_id',
      'log_activity',
      'log_timestamp',
      'log_user_id'
    ]
}
