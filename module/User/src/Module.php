<?php

namespace User;

use User\Controller\Factory\AuthControllerFactory;
use User\Controller\AuthController;
use User\Service\Factory\AuthenticationServiceFactory;
use User\Service\Factory\DoctrineAuthVerifyFactory;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\AuthenticationServiceInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ControllerProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\Mvc\MvcEvent;
use Zend\ServiceManager\Factory\InvokableFactory;

/**
 * Class Module
 * @package User
 */
class Module implements ConfigProviderInterface, ServiceProviderInterface, ControllerProviderInterface
{

    /**
     * @param MvcEvent $e
     */
    public function onBootstrap(MvcEvent $e)
    {
        $resources = ['admin', 'private'];
        $eventManager = $e->getApplication()->getEventManager();
        $container = $e->getApplication()->getServiceManager();
        $eventManager->attach(MvcEvent::EVENT_DISPATCH,
            function (MvcEvent $e) use ($container, $resources) {
                $match = $e->getRouteMatch();

                $authService = $container->get(AuthenticationServiceInterface::class);
                $routeName = $match->getMatchedRouteName();
                if ($authService->hasIdentity()) {
                    return;
                } else {
//                    foreach ($resources as $key => $value) {
//                        if (strpos($routeName, $value) !== false) {
                            $match->setParam('controller', AuthController::class)
                                ->setParam('action', 'login');
//                        }
//                    }
                }
            }, 100);


    }

    /**
     * @return mixed
     */
    public function getConfig()
    {
        return include __DIR__ . "/../config/module.config.php";
    }

    /**
     * @return array
     */
    public function getServiceConfig()
    {
        return [
            'aliases' => [
                AuthenticationService::class            => AuthenticationServiceInterface::class
            ],
            'factories' => [
                AuthenticationServiceInterface::class   => AuthenticationServiceFactory::class
            ]
        ];
    }

    /**
     * @return array
     */
    public function getControllerConfig()
    {
        return [
            'factories' => [
                AuthController::class => AuthControllerFactory::class
            ]
        ];
    }

}
