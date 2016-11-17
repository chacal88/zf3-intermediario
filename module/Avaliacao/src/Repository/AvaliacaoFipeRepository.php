<?php


namespace Avaliacao\Repository;


use Common\Repository\IRepository;
use Common\Repository\TRepository;
use Doctrine\ORM\EntityManager;

class AvaliacaoFipeRepository implements IRepository
{

    use TRepository;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

}