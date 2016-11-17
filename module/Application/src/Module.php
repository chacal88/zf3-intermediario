<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\View\Model\ViewModel;

class Module
{
    const VERSION = '3.0.0dev';

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    /**
     * @param  \Zend\Mvc\MvcEvent $e The MvcEvent instance
     * @return void
     */
    public function onBootstrap($e)
    {
        // Register a dispatch event
        $app = $e->getParam('application');
        $app->getEventManager()->attach('dispatch', [$this, 'setLayout']);
    }

    /**
     * @param  \Zend\Mvc\MvcEvent $e The MvcEvent instance
     * @return void
     */
    public function setLayout($e)
    {
//        $matches = $e->getRouteMatch();
//        $controller = $matches->getParam('controller');
//        if (false === strpos($controller, __NAMESPACE__)) {
//            // not a controller from this module
//            return;
//        }

        // Set the layout template
        $viewModel = $e->getViewModel();

        $layoutHead = new ViewModel();
        $layoutHead->setTemplate('layout/head');

        $layoutHeader = new ViewModel();
        $layoutHeader->setTemplate('layout/header');

        $layoutSideBar = new ViewModel();
        $layoutSideBar->setTemplate('layout/sideBar');

        $layoutThemePainel = new ViewModel();
        $layoutThemePainel->setTemplate('layout/themePainel');

        $layoutQuickSideBar = new ViewModel();
        $layoutQuickSideBar->setTemplate('layout/quickSideBar');

        $layoutFooter = new ViewModel();
        $layoutFooter->setTemplate('layout/footer');

        $layoutPlugins = new ViewModel();
        $layoutPlugins->setTemplate('layout/plugins');

        $viewModel->addChild($layoutHead, 'layoutHead')
            ->addChild($layoutHeader, 'layoutHeader')
            ->addChild($layoutSideBar, 'layoutSideBar')
          //  ->addChild($layoutThemePainel, 'layoutThemePainel')
          //  ->addChild($layoutQuickSideBar, 'layoutQuickSideBar')
            ->addChild($layoutFooter, 'layoutFooter')
            ->addChild($layoutPlugins, 'layoutPlugins');
    }
}
