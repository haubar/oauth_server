<?php
/**
 * Command to Setting OAth2 server config
 *
 * @package   lucadegasperi/oauth2-server-laravel
 * @author    Luca Degasperi <luca@lucadegasperi.com>
 * @copyright Copyright (c) Luca Degasperi
 * @licence   http://mit-license.org/
 * @link      https://github.com/lucadegasperi/oauth2-server-laravel
 */

namespace Ithome\OAuthServer\Console;

use Illuminate\Console\Command;

class OAthSetCommand extends Command
{

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'oauth-server:set-config';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'OAuth 2 Server package config setting....';

    /**
     * Create a new reminder table command instance.
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        $this->call('config:publish', ['package' => 'lucadegasperi/oauth2-server-laravel']);
        $this->call('dump-autoload');

        $this->call('oauth2-server:migrations');
        $this->call('dump-autoload');
    }
}
