<?php namespace Blackbirddev\Entry;

use Illuminate\Support\ServiceProvider;

class EntryServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/config.php' => config_path('entry.php'),
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('entrust', function ($app) {
            return new Entry($app);
        });
    }

}