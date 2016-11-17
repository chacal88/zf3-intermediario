<?php

namespace Avaliacao\Service\Factory;


use Avaliacao\Repository\AvaliacaoFipeRepository;
use Avaliacao\Service\FipeService;
use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\Http\Client;
use Zend\Http\Request;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

class FipeServiceFactory implements FactoryInterface
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

        $avaliacaoFipeRepository = $container->get(AvaliacaoFipeRepository::class);
//        $tipo = $requestedName::name;
        $url = "https://fipe-parallelum.rhcloud.com/api/v1/";

        return new FipeService($avaliacaoFipeRepository, $url);
    }
}