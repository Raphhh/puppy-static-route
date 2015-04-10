<?php
namespace Puppy\StaticRoute;

use Puppy\Application;
use Puppy\Module\IModule;

/**
 * Class StaticRoute
 * @package Puppy
 * @author Raphaël Lefebvre <raphael@raphaellefebvre.be>
 */
class StaticModule implements IModule
{

    /**
     * init the module.
     *
     * @param Application $application
     */
    public function init(Application $application)
    {
        $application->addService('staticController', new StaticControllerService());
        $application->any(':all', $application->getService('staticController'));
    }
}
 