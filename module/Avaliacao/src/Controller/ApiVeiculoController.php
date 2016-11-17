<?php


namespace Avaliacao\Controller;


use Avaliacao\Entity\Debito;
use Avaliacao\Entity\Veiculo;
use Avaliacao\Service\VeiculoService;
use Zend\Hydrator\ClassMethods;
use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

/**
 * Class ApiVeiculoController
 * @package Avaliacao\Controller
 */
class ApiVeiculoController extends AbstractRestfulController
{

    /**
     * @var VeiculoService
     */
    private $veiculoService;


    public function __construct(VeiculoService $veiculoService)
    {
        $this->veiculoService = $veiculoService;
    }

    public function update($id, $data)
    {

        $veiculo = $this->veiculoService->findOneBy(Veiculo::class, ['id' => $id]);

        /** @var Veiculo $veiculo */
        if (! $veiculo ) {
            return new JsonModel(['status' => 'erro', 'menssage'=>'Veiculo não localizado']);
        }

        $veiculo->hydrate($data['data']);
        $veiculo = $this->veiculoService->update($veiculo);
//        \Zend\Debug\Debug::dump($veiculo->getIdBot());exit;

        $hydrator = new ClassMethods();
        $data = $hydrator->extract($veiculo);


        return new JsonModel(['status' => 'ok', 'data' => $data]);
    }
}