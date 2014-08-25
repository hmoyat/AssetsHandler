<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/AssetsHandler for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace AssetsHandler;

use AssetsHandler\View\Helper\AssetsHandler;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module implements AutoloaderProviderInterface
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    // if we're in a namespace deeper than one level we need to fix the \ in the path
                    __NAMESPACE__ => __DIR__ . '/src/' . str_replace('\\', '/', __NAMESPACE__),
                ),
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getViewHelperConfig()
    {
        return array(
            'factories' => array(
                'applicationImagesAssetsHandler' => function ($sm) {
                        $config = $sm->getServiceLocator()->get('Config');
                        $path = $config['application']['path']['images'];
                        return new AssetsHandler($path);
                    },
                'applicationCssAssetsHandler' => function ($sm) {
                        $config = $sm->getServiceLocator()->get('Config');
                        $path = $config['application']['path']['css'];
                        return new AssetsHandler($path);
                    },
                'applicationJsAssetsHandler' => function ($sm) {
                        $config = $sm->getServiceLocator()->get('Config');
                        $path = $config['application']['path']['js'];
                        return new AssetsHandler($path);
                    },

                'templateJsAssetsHandler' => function ($sm) {
                        $config = $sm->getServiceLocator()->get('Config');
                        $path = $config['template']['ace']['path']['js'];
                        return new AssetsHandler($path);
                    },
                'templateCssAssetsHandler' => function ($sm) {
                        $config = $sm->getServiceLocator()->get('Config');
                        $path = $config['template']['ace']['path']['css'];
                        return new AssetsHandler($path);
                    },

            )
        );
    }

    public function onBootstrap(MvcEvent $e)
    {
        // You may not need to do this if you're doing it elsewhere in your
        // application
        $eventManager = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }
}
