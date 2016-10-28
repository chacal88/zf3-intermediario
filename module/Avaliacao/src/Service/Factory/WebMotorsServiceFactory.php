<?php

namespace Avaliacao\Service\Factory;


use Avaliacao\Repository\WebMotorsRepository;
use Avaliacao\Service\FipeService;
use Avaliacao\Service\WebMotorsService;
use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\Http\Client;
use Zend\Http\Request;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

class WebMotorsServiceFactory implements FactoryInterface
{


    /**
     * Create an object
     *
     * @param  ContainerInterface $container
     * @param  string $requestedName
     * @param  null|array $options
     * @return object
     * @throws ServiceNotFoundException if unable to resolve the service.
     * @throws ServiceNotCreatedException if an exception is raised when
     *     creating a service.
     * @throws ContainerException if any other error occurs
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {

        $webMotorsRepository = $container->get(WebMotorsRepository::class);
        return new WebMotorsService($webMotorsRepository);
    }
}