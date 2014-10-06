<?php

class Envelopes_BirthdaysController extends Zend_Controller_Action
{
    function init() {
        parent::init();
        $this->_helper->layout->setLayout('envelopes');
        Zend_Layout::getMvcInstance()->assign('nav', 'here goes the nav');
        $this->view->headScript()->appendFile('/js/jQuery/jquery-2.1.1.min.js');
        $this->view->headScript()->appendFile('/js/uikit/uikit.js');
        $this->view->headLink()->appendStylesheet('/css/uikit/uikit.gradient.css');
        $this->view->headLink()->appendStylesheet('/css/uikit/addons/uikit.gradient.addons.min.css');
    }
    
    function indexAction()
    {
        //list
        $mapper = new Envelopes_Model_BirthdayMapper();
        echo \Utilities\Utilities::pre($mapper->find(1));
        echo \Utilities\Utilities::pre($mapper->findAllRows());
        echo \Utilities\Utilities::pre($mapper->findByUsername('ppages'));
    }
    
    function birthdayAction()
    {
        echo \Utilities\Utilities::pre($this->_request->getParams());
        $id = $this->_request->getParam('id');
        if($id){
            if($id != -1){
            $mapper = new Envelopes_Model_BirthdayMapper();
            $this->view->birthday = $mapper->find($id);
            if(!$this->view->birthday && $id != -1){
                Envelopes_Model_Messages::add('Wrong Id','error');
            }
        }
        
        }
        
        if(!$this->view->birthday){
            $this->view->birthday = new Envelopes_Model_Birthday('', '', '');
        }
    }
    
}