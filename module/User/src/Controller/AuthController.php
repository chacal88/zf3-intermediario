<?php

namespace User\Controller;

use Avaliacao\Lib\Enum\RoutesEnum;
use User\Form\LoginForm;
use Zend\Authentication\AuthenticationServiceInterface;
use Zend\Authentication\Adapter\DbTable\CallbackCheckAdapter;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AuthController extends AbstractActionController
{
    /**
     * @var AuthenticationServiceInterface
     */
    private $authService;

    public function __construct(AuthenticationServiceInterface $authService)
    {
        $this->authService = $authService;
    }

    public function loginAction()
    {
        if ($this->authService->hasIdentity()) {
            return $this->redirect()->toRoute(RoutesEnum::VEICULO);
        }

        // Get the "layout" view model and set an alternate template
        $layout = $this->layout();
        $layout->setTemplate('layout/login');


        $form = new LoginForm();
        $messageError = null;
        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            $form->setData($data);
            if ($form->isValid()) {
                $formData = $form->getData();
                /** @var CallbackCheckAdapter $authAdapter */
                $authAdapter = $this->authService->getAdapter();
                $authAdapter->setIdentity($formData['username']);
                $authAdapter->setCredential($formData['password']);

                $result = $this->authService->authenticate();
                if ($result->isValid()) {
                    return $this->redirect()->toRoute(RoutesEnum::VEICULO);
                } else {
                    $messageError = "Login Inválido!";
                }
            }
        }
        return new ViewModel([
            'form' => $form,
            'messageError' => $messageError
        ]);
    }

    public function logoutAction()
    {
        $this->authService->clearIdentity();
        return $this->redirect()->toRoute('login');
    }
}
