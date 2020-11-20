<?php

namespace MarksIhor\LogModelActions;

use Illuminate\Support\ServiceProvider;

/**
 * Class MetasServiceProvider.
 */
class LogModelActionsServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     */
    public function boot()
    {
        // Migrations
        $this->publishes([
            \dirname(__DIR__) . '/migrations/' => database_path('migrations'),
        ], 'migrations');
    }
}
