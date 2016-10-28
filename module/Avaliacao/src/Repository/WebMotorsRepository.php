<?php


namespace Avaliacao\Repository;


use Common\Repository\IRepository;
use Common\Repository\TRepository;
use Doctrine\ORM\EntityManager;

class WebMotorsRepository implements IRepository
{

    use TRepository;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function getMarcas()
    {
        $qb = $this->em->createQueryBuilder();

        $qb->select(array(
            'wm.marca'
        ))
            ->from('Avaliacao\Entity\WebMotors', 'wm')->groupBy('wm.marca');

        return $qb->getQuery()->getResult();
    }

    public function getModelos($marca)
    {
        $qb = $this->em->createQueryBuilder();

        $qb->select(array(
            'wm.modelo'
        ))
            ->from('Avaliacao\Entity\WebMotors', 'wm')
            ->where('wm.marca = ?1')
            ->groupBy('wm.modelo')
            ->setParameter(1, $marca);

        return $qb->getQuery()->getResult();
    }

    public function getAnos($marca, $modelo)
    {
        $qb = $this->em->createQueryBuilder();

        $qb->select(array(
            'wm.ano'
        ))
            ->from('Avaliacao\Entity\WebMotors', 'wm')
            ->add('where',
                $qb->expr()->andX(
                    $qb->expr()->eq('wm.marca', '?1'),
                    $qb->expr()->eq('wm.modelo', '?2')
                )
            )
            ->groupBy('wm.ano')
            ->setParameter(1, $marca)
            ->setParameter(2, $modelo);

        return $qb->getQuery()->getResult();
    }

    public function getVeiculos($marca, $modelo, $ano)
    {
        $qb = $this->em->createQueryBuilder();

        $qb->select('wm')
            ->from('Avaliacao\Entity\WebMotors', 'wm')
            ->add('where',
                $qb->expr()->andX(
                    $qb->expr()->eq('wm.marca', '?1'),
                    $qb->expr()->eq('wm.modelo', '?2'),
                    $qb->expr()->eq('wm.ano', '?3')
                )
            )
            ->groupBy('wm.id')
            ->setParameter(1, $marca)
            ->setParameter(2, $modelo)
            ->setParameter(3, $ano);

        return $qb->getQuery()->getResult();
    }
}