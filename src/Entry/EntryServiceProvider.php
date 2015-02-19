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
        ]);

        $this->publishes([
            __DIR__ . '/../migrations/2015_02_19_102113_create_entry_tables.php' => $this->app->databasePath() . '/migrations',
        ]);
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