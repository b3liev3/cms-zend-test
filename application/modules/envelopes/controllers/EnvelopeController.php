<?php

class Envelopes_EnvelopeController extends Zend_Controller_Action {

    function init() {
        parent::init();
        $this->_helper->layout->setLayout('envelopes');
        Zend_Layout::getMvcInstance()->assign('nav', 'here goes the nav');
        $this->view->headScript()->appendFile('/js/jQuery/jquery-2.1.1.min.js');
        $this->view->headScript()->appendFile('/js/uikit/uikit.js');
        $this->view->headLink()->appendStylesheet('/css/uikit/uikit.gradient.css');
        $this->view->headLink()->appendStylesheet('/css/uikit/addons/uikit.gradient.addons.min.css');
    }

    function indexAction() {
        $this->view->headScript()->appendFile('/js/uikit/addons/datepicker.min.js');
        $id = $this->_request->getParam('id');
        $mapper = new Envelopes_Model_EnvelopeMapper();
        $envelope = $mapper->createObject('', '', '', '');
        if (!empty($id)) {
            $envelope = $mapper->find($id);
        }
        $this->view->envelope = $envelope;
    }

}