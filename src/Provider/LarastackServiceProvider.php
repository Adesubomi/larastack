<?php
/**
 * Created by PhpStorm.
 * User: Adesubomi
 * Date: 2/19/18
 * Time: 09:54 PM
 */

namespace Adesubomi\Larastack\Provider;

use Adesubomi\Larastack\Classes\Larastack;
use Illuminate\Support\ServiceProvider;

class LarastackServiceProvider extends ServiceProvider
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
