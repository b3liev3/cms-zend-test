<?php

class Envelopes_IndexController extends Zend_Controller_Action
{
    function init() {
        parent::init();
        $this->_helper->layout->setLayout('envelopes');
    }
    
    function indexAction()
    {
        $aux = new Envelopes_Model_Test();
    }
}