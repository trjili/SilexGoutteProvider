<?php
/**
 * Created by PhpStorm.
 * User: Tarek Rjili
 * Date: 3/23/15
 * Time: 23:20 PM
 */

namespace Trjili\Silex;

use Goutte\Client;
use Psr\Log\InvalidArgumentException;
use Silex\Application;
use Silex\ServiceProviderInterface;

class SilexGoutteServiceProvider implements ServiceProviderInterface
{
    /** @var string */
    private $prefix;

    /**
     * @param string $prefix
     */
    public function __construct($prefix = 'goutte')
    {
        if (!is_string($prefix) || empty($prefix)) {
            throw new InvalidArgumentException(sprintf('$prefix must be a valid string, %s given', gettype($prefix)));
        }
        $this->prefix = $prefix;
    }

    /**
     * @param Application $app
     */
    public function register(Application $app)
    {
        $app[$this->prefix] = $app->share(function (Application $app) {
            return new Client();
        });
    }

    /**
     * @param Application $app
     */
    public function boot(Application $app)
    {
    }
}