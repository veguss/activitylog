<?php

namespace BelgiLabs\ActivityLog;

use BelgiLabs\ActivityLog\Handlers\LogHandlerInterface;
use Illuminate\Contracts\Auth\Guard;

class ActivityLogger
{
    private $logHandlers = [];
    private $auth;

    /**
     * @param LogHandlerInterface $handler
     * @param Guard $auth
     */
    public function __construct(LogHandlerInterface $handler, Guard $auth)
    {
        $this->logHandlers[] = $handler;
        $this->auth = $auth;
    }

    /**
     * Logs activity
     *
     * @param $description
     * @param null $user_id
     */
    public function log($user_id, $actionable_type, $actionable_id, $action, $fileId = null)
    {
        foreach ($this->logHandlers as $handler) {
            $handler->log($user_id, $actionable_type, $actionable_id, $action, $fileId);
        }
    }
}