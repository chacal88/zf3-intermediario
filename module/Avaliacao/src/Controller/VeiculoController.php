<?php


namespace Avaliacao\Controller;


use Application\Storage\ZendSessionStorage;
use Avaliacao\Form\VeiculoForm;
use Avaliacao\Lib\Enum\RoutesEnum;
use Avaliacao\Model\Veiculo;
use Avaliacao\Model\VeiculoTable;
use Avaliacao\Service\ApiService;
use Zend\Http\Client;
use Zend\Http\Request;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Session\Container;
use Zend\Session\SessionManager;
use Zend\Session\Storage\ArrayStorage;
use Zend\Session\Storage\SessionStorage;
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
     * @var ApiService
     */
    private $apiService;

    /**
     * VeiculoController constructor.
     * @param VeiculoTable $table
     * @param VeiculoForm $form
     * @param ApiService $apiService
     */
    public function __construct(VeiculoTable $table, VeiculoForm $form, ApiService $apiService)
    {
        $this->table = $table;
        $this->form = $form;
        $this->apiService = $apiService;
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

        return $this->redirect()->toRoute(RoutesEnum::AVALIACAO_VEICULO,['action' => 'step1']);
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