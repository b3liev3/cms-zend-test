<?php

class Envelopes_IndexController extends Zend_Controller_Action
{
    function init() {
        parent::init();
        $this->_helper->layout->setLayout('envelopes');
        Zend_Layout::getMvcInstance()->assign('nav', 'here goes the nav');
        $this->view->headScript()->appendFile('js/jQuery/jquery-2.1.1.min.js');
        $this->view->headScript()->appendFile('js/uikit/uikit.js');
        $this->view->headLink()->appendStylesheet('/css/uikit/uikit.gradient.css');
    }
    
    /**
     * Create or modify existing envelope
     */
    function indexAction()
    {
        $userMapper = new Envelopes_Model_UserMapper();
        echo \Utilities\Utilities::pre($userMapper->findAllRows());
        echo \Utilities\Utilities::pre($userMapper->findRow('ppages'));
    }
    
    function loginAction()
    {
        $login = new Zend_Session_Namespace('Login');
        $login->user = 'ppages';
        exit('logged');
    }
    
}