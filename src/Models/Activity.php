<?php

namespace BelgiLabs\ActivityLog\Models;

use Eloquent;

class Activity extends Eloquent
{
    protected $table = 'activity_logs';

    protected $fillable = ['user_id', 'actionable_type', 'actionable_id', 'action'];

    /**
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}