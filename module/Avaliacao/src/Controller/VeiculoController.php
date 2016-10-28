<?php


namespace Avaliacao\Controller;


use Avaliacao\Entity\Cliente;
use Avaliacao\Entity\Veiculo;
use Avaliacao\Form\ClienteForm;
use Avaliacao\Form\VeiculoForm;
use Avaliacao\Lib\Enum\RoutesEnum;
use Avaliacao\Service\ApiDetranService;
use Avaliacao\Service\ApiService;
use Avaliacao\Service\VeiculoService;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Class VeiculoController
 * @package Avaliacao\Controller
 */
class VeiculoController extends AbstractActionController
{

    /**
     * @var VeiculoForm
     */
    private $veiculoForm;

    /**
     * @var ClienteForm
     */
    private $clienteForm;

    /**
     * @var ApiService
     */
    private $apiService;

    /**
     * @var VeiculoService
     */
    private $veiculoService;
    /**
     * @var ApiDetranService
     */
    private $apiDetranService;

    /**
     * VeiculoController constructor.
     * @param VeiculoForm $veiculoForm
     * @param ClienteForm $clienteForm
     * @param VeiculoService $veiculoService
     * @param ApiService $apiService
     * @param ApiDetranService $apiDetranService
     */
    public function __construct(
        VeiculoForm $veiculoForm,
        ClienteForm $clienteForm,
        VeiculoService $veiculoService,
        ApiService $apiService,
        ApiDetranService $apiDetranService)
    {

        $this->veiculoForm = $veiculoForm;
        $this->clienteForm = $clienteForm;
        $this->veiculoService = $veiculoService;
        $this->apiService = $apiService;
        $this->apiDetranService = $apiDetranService;
    }

    /**
     * @return ViewModel
     */
    public function indexAction()
    {

        return new ViewModel([
            'veiculos' => $this->veiculoService->findAll(Veiculo::class)
        ]);
    }

    /**
     * @return \Zend\Http\Response|ViewModel
     */
    public function viewAction()
    {
        $id = (int)$this->params()->fromRoute('id', 0);

        if (!$id) {
            return $this->redirect()->toRoute(RoutesEnum::VEICULO);
        }

        $veiculo = $this->veiculoService->findOneBy(Veiculo::class, ['id' => $id]);

        if ($veiculo == false) {
            return $this->redirect()->toRoute(RoutesEnum::VEICULO);
        }

        return new ViewModel([
            'veiculo' => $veiculo,
        ]);
    }

    /**
     * @return array|\Zend\Http\Response
     */
    public function addAction()
    {

        $form = $this->veiculoForm;
        $request = $this->getRequest();

        if (!$request->isPost()) {
            return ['form' => $form];
        }

        $form->setData($request->getPost());

        if (!$form->isValid()) {
            return ['form' => $form];
        }

        /** @var Veiculo $veiculo */
        $veiculo = $form->getData();

        if ($this->veiculoService->findOneBy(Veiculo::class, ['placa' => $veiculo->getPlaca()])) {
            return $this->redirect()->toRoute(RoutesEnum::VEICULO, ['action' => 'view', 'id' => $veiculo->getId()]);
        }

        $veiculo = $this->apiService->findCar($veiculo);

        if (null === $veiculo->getRenavam()) {
            return ['form' => $form];
        }

        $veiculo = $this->veiculoService->save($veiculo);

        $veiculoBot = $this->apiDetranService->insertVeiculo($veiculo);

        if (empty($veiculoBot['id'])) {

            $veiculo = $this->veiculoService->delete($veiculo);

            //TODO criar validacao pra exibir na view
            throw new \InvalidArgumentException('Não foi possivel se comunicar com Detran.', 500);
        }

        $veiculo->setIdBot($veiculoBot['id']);

        $veiculo = $this->veiculoService->update($veiculo);

        return $this->redirect()->toRoute(RoutesEnum::VEICULO, ['action' => 'cliente', 'id' => $veiculo->getId()]);
    }

    /**
     * @return array|\Zend\Http\Response
     */
    public function clienteAction()
    {

        $veiculoId = $this->params()->fromRoute('id', 0);

        /** @var Veiculo $veiculo */
        if (!$veiculoId || !($veiculo = $this->veiculoService->findOneBy(Veiculo::class, ['id' => $veiculoId]))) {
            return $this->redirect()->toRoute(RoutesEnum::VEICULO);
        }

        $form = $this->clienteForm;
        $request = $this->getRequest();

        if (!$request->isPost()) {

            $cliente = $veiculo->getCliente();

            if (empty($cliente) && !($cliente = $this->veiculoService->findOneBy(Cliente::class, ['cpfCnpj' => $veiculo->getProprietarioDoc()]))) {
                $cliente = $this->apiService->findByDoc($veiculo->getProprietarioDoc());
            }
            $form->bind($cliente);
            return [
                'form' => $form,
                'veiculoId' => $veiculoId
            ];
        }

        $form->setData($request->getPost());
        $form->isValid();

        $cliente = new Cliente();
        $cliente->hydrate($form->getData()['cliente']);

        $veiculo->setCliente($cliente);

        $this->veiculoService->update($veiculo);

        return $this->redirect()->toRoute(RoutesEnum::VEICULO);

    }

    /**
     * @return \Zend\Http\Response
     */
    public function deleteAction()
    {
        $id = (int)$this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute(RoutesEnum::VEICULO);
        }

        $veiculo = $this->veiculoService->findOneBy(Veiculo::class, ['id' => $id]);

        if ($veiculo == false) {
            return $this->redirect()->toRoute(RoutesEnum::VEICULO);
        }
        $this->veiculoService->delete($veiculo);

        return $this->redirect()->toRoute(RoutesEnum::VEICULO);

    }

}