<?php
/**
 * Created by PhpStorm.
 * User: Tarek Rjili
 * Date: 3/23/15
 * Time: 23:45 PM
 */

namespace Trjili\Silex;

use Goutte\Client;
use Silex\Application;

class SilexGoutteServiceProviderTest extends \PHPUnit_Framework_TestCase
{

    public function testRegisterWithoutPrefix()
    {
        $app = new Application();
        $app->register(new SilexGoutteServiceProvider());
        $this->assertTrue($app['goutte'] instanceof Client);
    }

    public function testRegisterWithPrefix()
    {
        $app = new Application();
        $app->register(new SilexGoutteServiceProvider('custom.prefix'));
        $this->assertTrue($app['custom.prefix'] instanceof Client);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testRegisterException()
    {
        $app = new Application();
        $app->register(new SilexGoutteServiceProvider(mt_rand()));
    }

}