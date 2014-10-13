<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initView()
    {
        //Initialize view
        $view = new Zend_View();
        $view->doctype('XHTML1_STRICT');
        $view->headTitle('Zend CMS');
        
        $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('ViewRenderer');
        $viewRenderer->setView($view);
        
        return $view;
    }
    
    protected function _initAutoloader()
    {
        $autoloader = new Zend_Loader_Autoloader_Resource(
            array(
                'basePath'      => APPLICATION_PATH."/modules/envelopes",
                'namespace'     => 'Envelopes',
                'resourceTypes' => array(
                    'plugin' => array(
                        'path'      => '/plugins',
                        'namespace' => 'Plugin',
                    )
                )
            )
        );
    }
    
    protected function _initTest()
    {
        $front = Zend_Controller_Front::getInstance();
        $front->registerPlugin(new Envelopes_Plugin_Login());
    }
    
    
    protected function _initAutoload()
    {
        //Add autoloader empty namespace
        $autoLoader = Zend_Loader_Autoloader::getInstance();
        $resourceLoader = new Zend_Loader_Autoloader_Resource(array(
            'basePath' => APPLICATION_PATH."/modules/default",
            'namespace' => '',
            'resourceTypes' => array(
                'form' => array(
                    'path' => '/forms/',
                    'namespace' => 'Form',
                ),
                'model' => array(
                    'path' => '/models',
                    'namespace' => 'Model'
                )
            )
        ));
        
        //return it so that it can be stored by the bootstrap
        return $autoLoader;
    }
}

