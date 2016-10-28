<?php

namespace Avaliacao\Service;

use Avaliacao\Repository\WebMotorsRepository;
use Common\Repository\IRepository;
use Common\Service\TRepositoryService;

class WebMotorsService implements IRepository
{

    use TRepositoryService;

    public function __construct(WebMotorsRepository $webMotorsRepository)
    {
        $this->repository = $webMotorsRepository;
    }


    public function getMarcas()
    {
        return $this->repository->getMarcas();
    }

    public function getModelos($marca)
    {
        return $this->repository->getModelos($marca);
    }

    public function getAnos($marca, $modelo)
    {
        return $this->repository->getAnos($marca, $modelo);
    }

    public function getVeiculos($marca, $modelo, $ano)
    {

        return $this->repository->getVeiculos($marca, $modelo, $ano);
    }

}