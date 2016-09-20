<?php

namespace Avaliacao\Model\Factory;

use Avaliacao\Model\Cliente;
use Interop\Container\ContainerInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class ProprietarioTableGatewayFactory
{

    public function __invoke(ContainerInterface $container)
    {
        $dbAdapter = $container->get(AdapterInterface::class);
        $resultSetPrototype = new ResultSet();
        $resultSetPrototype->setArrayObjectPrototype(new Cliente());
        return new TableGateway('proprietarios', $dbAdapter, null, $resultSetPrototype);
    }


}