<?php

class Envelopes_EnvelopeController extends MyLibrary_Controller_Action {
    
    /**
     * Create or edit an envelope
     */
    function editAction()
    {
        $this->view->headScript()->appendFile('/js/uikit/addons/datepicker.min.js');
        $id = $this->_request->getParam('id');
        $mapper = new Envelopes_Model_EnvelopeMapper();

        if (!empty($id)) {
            $envelope = $mapper->find($id);
            if(!$envelope){
                Envelopes_Model_Messages::add('Id does not exist','error');
                $this->_redirect('/envelopes/envelope');
            }
        }else{
            $envelope = $mapper->createObject('', '', '','','');
        }
        $this->view->envelope = $envelope;
    }
    
    function indexAction()
    {
        $this->view->headScript()->appendFile('/js/uikit/addons/datepicker.min.js');
        
        $mapper = new Envelopes_Model_EnvelopeMapper();
        if($this->_request->getParam('create') == 'insert'){
            //prefilled
            $user = Zend_Registry::get('user');
            $envelope = $mapper->createObject($user->getId(),$this->_getParam('forwhom'),$this->_request->getParam('type'),'','');
        }else{
            //new
            $envelope = $mapper->createObject('', '', '', '');
        }
        $this->view->envelope = $envelope;
    }
}