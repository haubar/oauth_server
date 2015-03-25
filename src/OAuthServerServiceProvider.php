<?php
/**
 *
 * @package   ithome/
 * @author    Clark <clark@mail.ithome.com.tw>
 * @copyright Copyright (c) Clark
 * [see https://github.com/lucadegasperi/oauth2-server-laravel]
 */

namespace Ithome\OAuthServer;

use Illuminate\Support\ServiceProvider;

class OAuthServerServiceProvider extends ServiceProvider
{
    /**
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     * @return void
     */
    public function boot()
    {
        $this->package('ithome/oauthserver', 'oauthserver', __DIR__.'/');
    }

    /**
     * Register the service provider.
     * @return void
     */
    public function register()
    {
        $this->registerCommands();
    }


    /**
     * Get the services provided by the provider.
     */
    public function provides()
    {
        return [];
    }

    /**
     * Registers some utility commands with artisan
     * @return void
     */
    public function registerCommands()
    {
        $this->app->bind('command.oauth-server.controller', 'Ithome\OAuthServer\Console\OAuthControllerCommand');
        $this->app->bind('command.oauth-server.migrations', 'Ithome\OAuthServer\Console\MigrationsCommand');

        $this->commands('command.oauth-server.controller','command.oauth-server.migrations');
    }


}
