<?php

if ( ! function_exists('alog'))
{
    /**
     * Shorthand for ActivityLog::log().
     *
     * @param $description
     * @param null $user_id
     * @return void
     */
    function alog($description, $user_id = null)
    {
        $logger = app()->make('activitylog');
        $logger::log($description, $user_id);
    }
}