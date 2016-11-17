<?php


namespace Avaliacao\Repository;


use Common\Repository\IRepository;
use Common\Repository\TRepository;
use Doctrine\ORM\EntityManager;

class VeiculoRepository implements IRepository
{

    use TRepository;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

}