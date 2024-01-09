<?php
namespace TheWebbakery\Simplicate;

use Illuminate\Support\ServiceProvider;

class SimplicateServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->offerPublishing();
    }

    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/simplicate.php',
            'laravel-simplicate'
        );
    }

    public function offerPublishing(): void
    {
        if (! function_exists('config_path')) {
            // function not available and 'publish' not relevant in Lumen
            return;
        }

        $this->publishes([
            __DIR__.'/../config/simplicate.php' => config_path('laravel-simplicate.php'),
        ], 'simplicate-config');
    }
}