<?php

namespace BelgiLabs\ActivityLog\Handlers;

interface LogHandlerInterface
{

    /**
     * Logs activity
     *
     * @param $description
     * @param null $user_id
     */
    public function log($description, $user_id, $ip);
}