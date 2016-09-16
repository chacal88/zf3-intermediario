<?php

namespace Avaliacao\Model\Factory;

use Avaliacao\Model\Telefone;
use Interop\Container\ContainerInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class TelefoneTableGatewayFactory
{

    public function __invoke(ContainerInterface $container)
    {
        $dbAdapter = $container->get(AdapterInterface::class);
        $resultSetPrototype = new ResultSet();
        $resultSetPrototype->setArrayObjectPrototype(new Telefone());
        return new TableGateway('telefones', $dbAdapter, null, $resultSetPrototype);
    }


}