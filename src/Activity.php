<?php

namespace BelgiLabs\ActivityLog;

use Eloquent;

class Activity extends Eloquent
{
    protected $table = 'activity_logs';

    /**
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}