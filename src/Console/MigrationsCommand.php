<?php
/**
 * Command to ease the migrations publishing
 *
 * @package   lucadegasperi/oauth2-server-laravel
 * @author    Luca Degasperi <luca@lucadegasperi.com>
 * @copyright Copyright (c) Luca Degasperi
 * @licence   http://mit-license.org/
 * @link      https://github.com/lucadegasperi/oauth2-server-laravel
 */

namespace Ithome\OAuthServer\Console;

use Illuminate\Console\Command;

class MigrationsCommand extends Command
{

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'oauth-server:migrations';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create the migrations needed for and OAuth 2 Server';

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
        $this->call('migrate:publish', ['package' => 'ithome/oauthserver']);
        $this->call('dump-autoload');
    }
}
