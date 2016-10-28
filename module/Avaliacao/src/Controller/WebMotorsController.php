<?php


namespace Avaliacao\Controller;


use Avaliacao\Entity\ClienteTable;
use Avaliacao\Entity\Veiculo;
use Avaliacao\Entity\VeiculoTable;
use Avaliacao\Entity\WebMotors;
use Avaliacao\Entity\WMTable;
use Avaliacao\Form\WebMotorForm;
use Avaliacao\Form\WebMotorsForm;
use Avaliacao\Lib\Enum\RoutesEnum;
use Avaliacao\Service\VeiculoService;
use Avaliacao\Service\WebMotorsService;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;

/**
 * Class VeiculoController
 * @package Avaliacao\Controller
 */
class WebMotorsController extends AbstractActionController
{


    /**
     * @var VeiculoService
     */
    private $veiculoService;
    /**
     * @var WebMotorsService
     */
    private $webMotorsService;
    /**
     * @var WebMotorsForm
     */
    private $webMotorsForm;

    public function __construct(VeiculoService $veiculoService, WebMotorsService $webMotorsService, WebMotorsForm $webMotorsForm)
    {
        $this->veiculoService = $veiculoService;
        $this->webMotorsService = $webMotorsService;
        $this->webMotorsForm = $webMotorsForm;
    }

    /**
     * @return array
     */
    public function avaliarAction()
    {

        $id = (int)$this->params()->fromRoute('id', 0);

        if (!$id) {
            return $this->redirect()->toRoute(RoutesEnum::VEICULO);
        }

        $veiculo = $this->veiculoService->findOneBy(Veiculo::class, ['id' => $id]);

        $form = $this->webMotorsForm;

        $request = $this->getRequest();

        if (!$request->isPost()) {

            $marcas = $this->webMotorsService->getMarcas();

            $selectMarcas = array();
            for ($i = 0; $i < count($marcas); $i++) {
                $selectMarcas[$marcas[$i]['marca']] = $marcas[$i]['marca'];
            }

//            $form->bind($veiculo);

            $form->get('marca')->setLabel('Selecione a marca:')->setEmptyOption('Selecione')->setValueOptions($selectMarcas);

            return new ViewModel(['form' => $form, 'id' => $id, 'veiculo' => $veiculo]);
        }

        \Zend\Debug\Debug::dump($request->getPost());

        $form->setData($request->getPost());

        if (!$form->isValid()) {
//            return ['form' => $form];
        }
        $veiculo = $form->getData();
        \Zend\Debug\Debug::dump($veiculo);
        exit;


        $id = $this->veiculoTable->save($veiculo);
        return $this->redirect()->toRoute(RoutesEnum::VEICULO);

//        $cliente = new Cliente();
//        $cliente->exchangeArray($form->getData());


    }


    /**
     * @return JsonModel
     */
    public function getModelosAction()
    {

        $marca = $this->params()->fromPost('marca', 0);

        $modelos = $this->webMotorsService->getModelos($marca);

//        \Zend\Debug\Debug::dump($modelos);
        return new JsonModel([
            'modelos' => $modelos
        ]);
    }

    /**
     * @return JsonModel
     */
    public function getAnosAction()
    {

        $marca = $this->params()->fromPost('marca', 0);
        $modelo = $this->params()->fromPost('modelo', 0);
        $anos = $this->webMotorsService->getAnos($marca, $modelo);

        return new JsonModel([
            'anos' => $anos
        ]);
    }

    /**
     * @return JsonModel
     */
    public function getVeiculosAction()
    {

        $marca = $this->params()->fromPost('marca', 0);
        $modelo = $this->params()->fromPost('modelo', 0);
        $ano = $this->params()->fromPost('ano', 0);
        $veiculos = $this->webMotorsService->getVeiculos($marca, $modelo, $ano);
        $selectVeiculos = array();
        for ($i = 0; $i < count($veiculos); $i++) {
            $selectVeiculos[$veiculos[$i]->getId()] = 'Versão: ' . $veiculos[$i]->getVersao() . ' Cor: ' . $veiculos[$i]->getCor() . ' Fipe: ' . $veiculos[$i]->getFipeMed();
        }
        return new JsonModel(['veiculos' => $selectVeiculos]);
    }

    /**
     * @return JsonModel
     */
    public function getVeiculoAction()
    {

        $id = $this->params()->fromPost('id', 0);
        /** @var WebMotors $veiculo */
        $veiculo = $this->webMotorsService->findOneBy(WebMotors::class, ['id' => $id]);

        return new JsonModel(['webmotors' => [
            'marca' => $veiculo->getMarca(),
            'modelo' => $veiculo->getModelo(),
            'ano' => $veiculo->getAno(),
            'cor' => $veiculo->getCor(),
            'versao' => $veiculo->getVersao(),
            'km' => $veiculo->getKm(),
            'fipe' => $veiculo->getFipeMed(),
            'preco' => $veiculo->getPreco()
        ]]);
    }

}