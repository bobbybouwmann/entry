<?php namespace Blackbirddev\Entry;

use Illuminate\Support\ServiceProvider;

class EntryServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application events.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/config.php' => config_path('entry.php'),
        ], 'config');

        $this->publishes([
            __DIR__ . '/../migrations/' => base_path('/database/migrations')
        ], 'migrations');

        $this->publishes([
            __DIR__ . '/../seeds/' => base_path('/database/seeds')
        ], 'seeds');
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->registerEntry();

        $this->mergeConfig();
    }

    /**
     * Register the application binding.
     */
    private function registerEntry()
    {
        $this->app->bind('entry', function ($app) {
            return new Entry($app);
        });
    }

    /**
     * Merge users's and entry's config.
     */
    private function mergeConfig()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'entrust');
    }

}