<?php
namespace BelgiLabs\ActivityLog;

use BelgiLabs\ActivityLog\Handlers\EloquentHandler;
use Illuminate\Support\ServiceProvider;

class ActivityLogServiceProvider extends ServiceProvider
{

    protected $defer = true;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ActivityLogger::class,
            ActivityLogger::class
        );

        $this->app->bind(
            LogHandlerInterface::class,
            EloquentHandler::class
        );
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $timestamp = date('Y_m_d_His', time());

        $this->publishes([
            __DIR__ . '/migrations/create_activity_logs_table.php' => database_path('/migrations/' . $timestamp . '_create_activity_logs_table.php')
        ], 'migrations');
    }
}