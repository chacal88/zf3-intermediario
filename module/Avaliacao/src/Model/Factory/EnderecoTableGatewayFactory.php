<?php

namespace Avaliacao\Model\Factory;

use Avaliacao\Model\Endereco;
use Interop\Container\ContainerInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class EnderecoTableGatewayFactory
{

    public function __invoke(ContainerInterface $container)
    {
        $dbAdapter = $container->get(AdapterInterface::class);
        $resultSetPrototype = new ResultSet();
        $resultSetPrototype->setArrayObjectPrototype(new Endereco());
        return new TableGateway('enderecos', $dbAdapter, null, $resultSetPrototype);
    }


}