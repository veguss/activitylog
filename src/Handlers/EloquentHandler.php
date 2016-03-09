<?php

namespace BelgiLabs\ActivityLog\Handlers;

use BelgiLabs\ActivityLog\Models\Activity;


class EloquentHandler implements LogHandlerInterface
{

    /**
     * Logs activity
     *
     * @param $description
     * @param null $user_id
     */
    public function log($description, $user_id, $ip)
    {
        Activity::create([
            'description' => $description,
            'user_id'     => $user_id,
            'ip'          => $ip,
        ]);
    }
}