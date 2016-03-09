<?php

namespace BelgiLabs\ActivityLog\Facades;

use BelgiLabs\ActivityLog\ActivityLogger;
use Illuminate\Support\Facades\Facade;

class ActivityLog extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return ActivityLogger::class;
    }
}