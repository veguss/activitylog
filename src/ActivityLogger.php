<?php

namespace BelgiLabs\ActivityLog;

use BelgiLabs\ActivityLog\Handlers\LogHandlerInterface;
use Request;

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
    public function log($description, $user_id = null)
    {
        $ip      = Request::ip();
        $user_id = $this->extractUserId($user_id);

        foreach ($this->logHandlers as $handler) {
            $handler->log($description, $user_id, $ip);
        }
    }

    /**
     * Extracts user id
     *
     * @param $user_id
     * @return null
     */
    public function extractUserId($user_id)
    {
        if (is_numeric($user_id)) {
            return $user_id;
        }

        if (is_object($user_id)) {
            return $user_id->id;
        }

        if ($this->auth->check()) {
            return $this->auth->user()->id;
        }

        return null;
    }
}