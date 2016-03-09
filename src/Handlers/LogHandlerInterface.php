<?php

namespace BelgiLabs\ActivityLog\Handlers;

use Log;

interface LogHandlerInterface
{

    /**
     * Logs activity
     *
     * @param $text
     * @param null $user_id
     */
    public function log($text, $user_id, $ip);
}