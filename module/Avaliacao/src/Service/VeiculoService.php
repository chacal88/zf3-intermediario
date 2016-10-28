<?php

namespace Avaliacao\Service;

use Avaliacao\Repository\VeiculoRepository;
use Common\Repository\IRepository;
use Common\Service\TRepositoryService;

class VeiculoService implements IRepository
{

    use TRepositoryService;

    public function __construct(VeiculoRepository $veiculoRepository)
    {
        $this->repository = $veiculoRepository;
    }

}