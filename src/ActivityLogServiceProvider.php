<?php
namespace BelgiLabs\ActivityLog;

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
            'activitylog',
            'BelgiLabs\ActivityLog\ActivityLog'
        );

        $this->app->bind(
            'BelgiLabs\ActivityLog\Handlers\LogHandlerInterface',
            'BelgiLabs\ActivityLog\Handlers\EloquentHandler'
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