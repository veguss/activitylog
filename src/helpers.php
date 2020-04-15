<?php

if ( ! function_exists('alog'))
{
    /**
     * Shorthand for ActivityLog::log().
     *
     * @param null $user_id
     * @param \Illuminate\Database\Eloquent\Model $actionable
     * @param $action
     * @return void
     */
    function alog($user_id, \Illuminate\Database\Eloquent\Model $actionable, $action, $fileId = null)
    {
        $logger = app()->make('activitylog');

        $logger->log($user_id, get_class($actionable), $actionable->id, $action, $fileId);
    }
}