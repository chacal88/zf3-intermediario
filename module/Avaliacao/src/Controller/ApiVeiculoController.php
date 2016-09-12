<?php


namespace Avaliacao\Controller;


use Avaliacao\Model\VeiculoTable;
use Avaliacao\Service\FipeService;
use JansenFelipe\FipeGratis\FipeGratis;
use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

/**
 * Class ApiVeiculoController
 * @package Avaliacao\Controller
 */
class ApiVeiculoController extends AbstractRestfulController
{

    /**
     * @var VeiculoTable
     */
    private $table;


    private $fipeService;

    public function __construct(VeiculoTable $table, FipeService $fipeService)
    {
        $this->table = $table;

        $this->fipeService = $fipeService;
    }

    public function getList()
    {

        $marca = $this->fipeService->getModelos(23);



        return new JsonModel([
            'marca' => $marca
        ]);

    }
}