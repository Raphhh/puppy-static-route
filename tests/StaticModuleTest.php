<?php
namespace Puppy\StaticRoute;

use Puppy\Application;
use Puppy\Template\TemplateModule;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class StaticModuleTest
 * @package StaticRoute
 * @author Raphaël Lefebvre <raphael@raphaellefebvre.be>
 */
class StaticModuleTest extends \PHPUnit_Framework_TestCase
{

    public function testInitForHomeUrl()
    {
        $config = new \ArrayObject();
        $config['template.directory.main'] = __DIR__ . '/resources/templates';
        $config['template.directory.cache'] = __DIR__ . '/resources/cache';
        $config['session.sessionStorageClass'] = 'Symfony\Component\HttpFoundation\Session\Storage\MockArraySessionStorage';

        $application = new Application($config, new Request());

        $staticModule = new StaticModule();
        $staticModule->init($application);

        $mainModule = new TemplateModule();
        $mainModule->init($application);

        $this->expectOutputString('Hello world!');
        $application->run();
    }

    public function testInitForBarUrl()
    {
        $config = new \ArrayObject();
        $config['template.directory.main'] = __DIR__ . '/resources/templates';
        $config['template.directory.cache'] = __DIR__ . '/resources/cache';
        $config['session.sessionStorageClass'] = 'Symfony\Component\HttpFoundation\Session\Storage\MockArraySessionStorage';

        $request = new Request();
        $request->server->set('REQUEST_URI', 'bar');

        $application = new Application($config, $request);

        $mainModule = new TemplateModule();
        $mainModule->init($application);

        $staticModule = new StaticModule();
        $staticModule->init($application);

        $this->expectOutputString('bar');
        $application->run();
    }
}
