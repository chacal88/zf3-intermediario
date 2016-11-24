<?php


namespace Avaliacao\Controller;


use Avaliacao\Entity\AvaliacaoFipe;
use Avaliacao\Entity\ClienteTable;
use Avaliacao\Entity\Veiculo;
use Avaliacao\Entity\VeiculoTable;
use Avaliacao\Entity\WebMotors;
use Avaliacao\Entity\WMTable;
use Avaliacao\Form\FipeForm;
use Avaliacao\Form\ObservacaoForm;
use Avaliacao\Form\WebMotorForm;
use Avaliacao\Form\WebMotorsForm;
use Avaliacao\Lib\Enum\RoutesEnum;
use Avaliacao\Service\FipeService;
use Avaliacao\Service\VeiculoService;
use Avaliacao\Service\WebMotorsService;
use Symfony\Component\Debug\Tests\DebugClassLoaderTest;
use Zend\Authentication\AuthenticationServiceInterface;
use Zend\I18n\Filter\NumberFormat;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;

/**
 * Class VeiculoController
 * @package Avaliacao\Controller
 */
class FipeController extends AbstractActionController
{

    /**
     * @var FipeService
     */
    private $fipeService;

    /**
     * @var AuthenticationServiceInterface
     */
    private $authService;

    /**
     * @var FipeForm
     */
    private $fipeForm;

    /**
     * @var ObservacaoForm
     */
    private $observacaoForm;


    public function __construct(
        FipeService $fipeService,
        AuthenticationServiceInterface $authService,
        FipeForm $fipeForm,
        ObservacaoForm $observacaoForm)
    {

        $this->fipeService = $fipeService;
        $this->authService = $authService;
        $this->fipeForm = $fipeForm;
        $this->observacaoForm = $observacaoForm;
    }

    /**
     * @return array
     */
    public function avaliarAction()
    {

        /** @var Veiculo $veiculo */

        $id = (int)$this->params()->fromRoute('id', 0);

        if (!$id) {
            return $this->redirect()->toRoute(RoutesEnum::VEICULO);
        }

        $veiculo = $this->fipeService->findOneBy(Veiculo::class, ['id' => $id]);

        $form = $this->fipeForm;

        $request = $this->getRequest();

        if (!$request->isPost()) {
            return ['form' => $form, 'veiculo' => $veiculo];
        }

        $form->setData($request->getPost());

        if(!$form->isValid()){
            return ['form' => $form, 'veiculo' => $veiculo];
        }

        $avaliacao = new AvaliacaoFipe();
        $avaliacao->hydrate($form->getData());
        $avaliacao->setVeiculo($veiculo);
        $avaliacao->setAvaliador($this->authService->getIdentity());

        $avaliacao = $this->fipeService->save($avaliacao);

        return $this->redirect()->toRoute(RoutesEnum::FIPE, ['action' => 'observacao', 'id' => $avaliacao->getId()]);

    }

    public function observacaoAction()
    {

        $id = (int)$this->params()->fromRoute('id', 0);

        if (!$id) {
            return $this->redirect()->toRoute(RoutesEnum::VEICULO);
        }

        /** @var AvaliacaoFipe $avaliacao */
        $avaliacao = $this->fipeService->findOneBy(AvaliacaoFipe::class, ['id' => $id]);

        $form = $this->observacaoForm;

        $form->bind($avaliacao);

        $request = $this->getRequest();

        $this->fipeService->setTipo($avaliacao->getTipo());
        $fipe = $this->fipeService->getVeiculo($avaliacao->getMarca(), $avaliacao->getModelo(), $avaliacao->getAno());

        if (!$request->isPost()) {

            return ['form' => $form, 'veiculo' => $avaliacao->getVeiculo(), 'fipe' => $fipe, 'id' => $avaliacao->getId()];
        }

        $form->setData($request->getPost());

        if (!$form->isValid()) {

            return ['form' => $form, 'veiculo' => $avaliacao->getVeiculo(), 'fipe' => $fipe, 'id' => $avaliacao->getId()];
        }

        $this->fipeService->update($avaliacao);

        return $this->redirect()->toRoute(RoutesEnum::VEICULO, ['action' => 'view', 'id' => $avaliacao->getVeiculo()->getId()]);

    }


    public function getMarcasAction()
    {
        $tipo  = $this->params()->fromPost('tipo');

        $this->fipeService->setTipo($tipo);

        $marcas = $this->fipeService->getMarcas();

        return new JsonModel([
            'marcas' => $marcas
        ]);
    }

    public function getModelosAction()
    {
        $tipo  = $this->params()->fromPost('tipo');
        $marca = $this->params()->fromPost('marca', 0);

        $this->fipeService->setTipo($tipo);

        $modelos = $this->fipeService->getModelos($marca);

        return new JsonModel([
            'modelos' => $modelos
        ]);
    }

    public function getAnosAction()
    {
        $tipo   = $this->params()->fromPost('tipo');
        $marca  = $this->params()->fromPost('marca', 0);
        $modelo = $this->params()->fromPost('modelo', 0);

        $this->fipeService->setTipo($tipo);

        $anos   = $this->fipeService->getAnos($marca, $modelo);

        return new JsonModel([
            'anos' => $anos
        ]);
    }

    public function getVeiculoAction()
    {
        $tipo   = $this->params()->fromPost('tipo');
        $marca  = $this->params()->fromPost('marca', 0);
        $modelo = $this->params()->fromPost('modelo', 0);
        $ano    = $this->params()->fromPost('ano', 0);

        $this->fipeService->setTipo($tipo);

        $veiculo = $this->fipeService->getVeiculo($marca, $modelo, $ano);

        return new JsonModel([
            'veiculo' => $veiculo
        ]);
    }


}