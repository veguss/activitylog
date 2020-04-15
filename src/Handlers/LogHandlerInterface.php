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
    public function log($user_id, $actionable_type, $actionable_id, $action, $fileId = null);
}