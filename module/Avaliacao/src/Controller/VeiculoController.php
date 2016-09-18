<?php


namespace Avaliacao\Controller;


use Avaliacao\Form\FipeForm;
use Avaliacao\Form\VeiculoForm;
use Avaliacao\Lib\Enum\RoutesEnum;
use Avaliacao\Model\Veiculo;
use Avaliacao\Model\VeiculoTable;
use Avaliacao\Service\ApiService;
use Avaliacao\Service\FipeService;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Session\Container;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;

/**
 * Class VeiculoController
 * @package Avaliacao\Controller
 */
class VeiculoController extends AbstractActionController
{

    /**
     * @var VeiculoTable
     */
    private $table;
    /**
     * @var VeiculoForm
     */
    private $form;

    /**
     * @var FipeForm
     */
    private $fipeForm;

    /**
     * @var ApiService
     */
    private $apiService;

    /**
     * @var FipeService
     */
    private $fipeService;

    /**
     * VeiculoController constructor.
     * @param VeiculoTable $table
     * @param VeiculoForm $form
     * @param ApiService $apiService
     */
    public function __construct(
        VeiculoTable $table,
        VeiculoForm $form,
        FipeForm $fipeForm,
        ApiService $apiService,
        FipeService $fipeService
    )
    {
        $this->table = $table;
        $this->form = $form;
        $this->fipeForm = $fipeForm;
        $this->apiService = $apiService;
        $this->fipeService = $fipeService;
    }

    /**
     * @return ViewModel
     */
    public function indexAction()
    {
        $postTable = $this->table;

        return new ViewModel([
            'veiculos' => $postTable->fetchAll()
        ]);
    }

    public function viewAction()
    {
        $id = (int)$this->params()->fromRoute('id', 0);

        if (!$id) {
            return $this->redirect()->toRoute(RoutesEnum::AVALIACAO_VEICULO);
        }

        try {
            $veiculo = $this->table->find($id);
        } catch (\Exception $e) {
            return $this->redirect()->toRoute(RoutesEnum::AVALIACAO_VEICULO);
        }

        return new ViewModel([
            'veiculo' => $veiculo,
            'commentForm' => ''
        ]);
    }

    /**
     * @return array|\Zend\Http\Response
     */
    public function addAction()
    {


        $form = $this->form;

        $request = $this->getRequest();

        if (!$request->isPost()) {
            return ['form' => $form];
        }

        $form->setData($request->getPost());

        if (!$form->isValid()) {
            return ['form' => $form];
        }

        $veiculo = new Veiculo();
        $veiculo->exchangeArray($form->getData());
        $veiculo = $this->apiService->findCar($veiculo);

        if (null === $veiculo->getRenavam()) {
            return ['form' => $form];
        }
        $session = new Container('cadastro_veiculo');
        $session->offsetSet('veiculo', $veiculo);

        return $this->redirect()->toRoute(RoutesEnum::AVALIACAO_VEICULO, ['action' => 'step1']);
    }

    public function step1Action()
    {

//        $session = new Container('cadastro_veiculo');
//        $veiculo = $session->offsetGet('veiculo');
//        \Zend\Debug\Debug::dump($session->offsetGet('veiculo'));
//
//        $proprietario = $this->apiService->findPeople($veiculo->getDocProprietario());
//        $session->offsetSet('proprietario', $proprietario);
//        $proprietario = $session->offsetGet('proprietario');
//        \Zend\Debug\Debug::dump($proprietario);

    }

    public function proprietarioAction()
    {
        $form = $this->fipeForm;

        $request = $this->getRequest();

        if (!$request->isPost()) {

            $marca = $this->fipeService->getMarcas();

            $selectMarcas = array();
            for ($i = 0; $i < count($marca); $i++) {
                $selectMarcas[$marca[$i]['codigo']] = $marca[$i]['nome'];
            }

            $form->get('marca')->setLabel('Selecione a marca:')->setEmptyOption('Selecione')->setValueOptions($selectMarcas);

            return ['form' => $form];
        }
    }

    public function getModeloAction()
    {
        $marca = (int)$this->params()->fromPost('marca', 0);

        $modelo = $this->fipeService->getModelos($marca);

        $selectModelos = array();
        for ($i = 0; $i < count($modelo); $i++) {
            $selectModelos[$modelo[$i]['codigo']] = $modelo[$i]['nome'];
        }

        return new JsonModel([
            'modelos' => $selectModelos
        ]);
    }

    public function getAnoAction()
    {
        $marca = (int)$this->params()->fromPost('marca', 0);
        $modelo = (int)$this->params()->fromPost('modelo', 0);

        $anos = $this->fipeService->getAnos($marca, $modelo);

        $selectAnos = array();
        for ($i = 0; $i < count($anos); $i++) {
            $selectAnos[$anos[$i]['codigo']] = $anos[$i]['nome'];
        }

        return new JsonModel([
            'anos' => $selectAnos
        ]);
    }

    public function getVeiculoAction()
    {
        $marca = $this->params()->fromPost('marca', 0);
        $modelo = $this->params()->fromPost('modelo', 0);
        $ano = $this->params()->fromPost('ano', 0);

        $veiculo = $this->fipeService->getVeiculo($marca, $modelo, $ano);

//        \Zend\Debug\Debug::dump($veiculos);
//
//
//        $selectVeiculos = array();
//        for ($i = 0; $i < count($veiculos); $i++) {
//            $selectVeiculos[$veiculos[$i]['codigo']] = $veiculos[$i]['nome'];
//        }

        return new JsonModel([
            'veiculo' => $veiculo
        ]);
    }

    /**
     * @return array|\Zend\Http\Response
     */
    public function editAction()
    {
        $id = (int)$this->params()->fromRoute('id', 0);

        if (!$id) {
            return $this->redirect()->toRoute(RoutesEnum::AVALIACAO_VEICULO);
        }

        try {
            $veiculo = $this->table->find($id);
        } catch (\Exception $e) {
            return $this->redirect()->toRoute(RoutesEnum::AVALIACAO_VEICULO);
        }

        $form = $this->form;
        $form->bind($veiculo);

        $request = $this->getRequest();

        if (!$request->isPost()) {
            return [
                'id' => $id,
                'form' => $form
            ];
        }

        $form->setData($request->getPost());

        if (!$form->isValid()) {
            return [
                'id' => $id,
                'form' => $form
            ];
        }

        $this->table->save($veiculo);
        return $this->redirect()->toRoute(RoutesEnum::AVALIACAO_VEICULO);
    }

    /**
     * @return \Zend\Http\Response
     */
    public function deleteAction()
    {
        $id = (int)$this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute(RoutesEnum::AVALIACAO_VEICULO);
        }

        $this->table->delete($id);
        return $this->redirect()->toRoute(RoutesEnum::AVALIACAO_VEICULO);

    }

}