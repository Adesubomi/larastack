<?php
/**
 * Created by PhpStorm.
 * User: Adesubomi
 * Date: 2/19/18
 * Time: 09:54 PM
 */

namespace Adesubomi\Larastack\Provider;

use Adesubomi\Larastack\Larastack;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class LarastackServiceProvider extends LaravelServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../config/larastack.php' => config_path('larastack.php')
        ]);

        $this->app->singleton(
            Larastack::class,
            new Larastack()
        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('larastack', Larastack::class);
    }
}
