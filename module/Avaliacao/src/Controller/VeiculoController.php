<?php


namespace Avaliacao\Controller;


use Avaliacao\Form\PostForm;
use Avaliacao\Lib\Enum\RoutesEnum;
use Avaliacao\Model\Veiculo;
use Avaliacao\Model\VeiculoTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class VeiculoController extends AbstractActionController
{
    /**
     * @var PostTable
     */
    private $table;
    /**
     * @var PostForm
     */
    private $form;

    public function __construct(VeiculoTable $table, PostForm $form)
    {
        $this->table = $table;
        $this->form = $form;
    }

    public function indexAction()
    {
        $postTable = $this->table;

        return new ViewModel([
            'posts' => $postTable->fetchAll()
        ]);
    }

    public function addAction()
    {
        $form = $this->form;
        $form->get('submit')->setValue('Add Post');

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
        $this->table->save($veiculo);
        return $this->redirect()->toRoute(RoutesEnum::AVALIACAO_VEICULO_INDEX);
    }

    public function editAction()
    {
        $id = (int)$this->params()->fromRoute('id', 0);

        if (!$id) {
            return $this->redirect()->toRoute(RoutesEnum::AVALIACAO_VEICULO_INDEX);
        }

        try {
            $post = $this->table->find($id);
        } catch (\Exception $e) {
            return $this->redirect()->toRoute(RoutesEnum::AVALIACAO_VEICULO_INDEX);
        }

        $form = $this->form;
        $form->bind($post);
        $form->get('submit')->setAttribute('value', 'Edit Post');

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

        $this->table->save($post);
        return $this->redirect()->toRoute(RoutesEnum::AVALIACAO_VEICULO_INDEX);
    }

    public function deleteAction()
    {
        $id = (int)$this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute(RoutesEnum::AVALIACAO_VEICULO_INDEX);
        }

        $this->table->delete($id);
        return $this->redirect()->toRoute(RoutesEnum::AVALIACAO_VEICULO_INDEX);
        
    }

}