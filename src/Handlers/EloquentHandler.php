<?php

namespace BelgiLabs\ActivityLog\Handlers;

use BelgiLabs\ActivityLog\Models\Activity;
use Illuminate\Database\Eloquent\Model;


class EloquentHandler implements LogHandlerInterface
{
    public function log($user_id, $actionable_type, $actionable_id, $action, $fileId = null)
    {
        Activity::create([
            'user_id' => $user_id,
            'actionable_type' => $actionable_type,
            'actionable_id' => $actionable_id,
            'action' => $action,
            'file_id' => $fileId
        ]);
    }
}