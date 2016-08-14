<?php

namespace Avaliacao\Model\Factory;

use Avaliacao\Model\Veiculo;
use Interop\Container\ContainerInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class VeiculoTableGatewayFactory
{

    public function __invoke(ContainerInterface $container)
    {
        $dbAdapter = $container->get(AdapterInterface::class);
        $resultSetPrototype = new ResultSet();
        $resultSetPrototype->setArrayObjectPrototype(new Veiculo());
        return new TableGateway('veiculo', $dbAdapter, null, $resultSetPrototype);
    }


}