<?php
use Illuminate\Support\ServiceProvider;
class SimplicateServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->offerPublishing();
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/simplicate.php',
            'laravel-simplicate'
        );
    }

    public function offerPublishing() {
        if (! function_exists('config_path')) {
            // function not available and 'publish' not relevant in Lumen
            return;
        }

        $this->publishes([
            __DIR__.'/../config/simplicate.php' => config_path('laravel-simplicate.php'),
        ], 'simplicate-config');
    }
}