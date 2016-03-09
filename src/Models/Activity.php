<?php

namespace BelgiLabs\ActivityLog\Models;

use Eloquent;

class Activity extends Eloquent
{
    protected $table = 'activity_logs';

    protected $fillable = ['description', 'user_id', 'ip'];

    /**
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}