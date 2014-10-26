<?php

class Envelopes_BirthdaysController extends MyLibrary_Controller_Action {

    /**
     * 
     */
    function indexAction() {
        
        //list
        $envelopesMapper = new Envelopes_Model_EnvelopeMapper();
        $rows = $envelopesMapper->getEnvelopeTableRows();
        if($rows){
            $this->view->rows = $rows;
        }else{
            Envelopes_Model_Messages::add('No Birthdays in the System','error');
        }
    }

    /**
     * Create or edit birthdays
     */
    function birthdayAction() {
        
        //$this->_addUikitComponent('datepicker');
        
        $this->_addJs($this->view->baseUrl().'/js/envelopes/birthday-page.js');
        $this->_addJs($this->view->baseUrl().'/js/tools/jquery.maskedinput.min.js');
        
        $mapper = new Envelopes_Model_BirthdayMapper();
        $operation = $this->_request->getParam('operation');
        
        $birthday = new Envelopes_Model_Birthday('','');
        
        if ($operation){
            if(!$this->_validateParams($this->_request->getParams())){
                //nothing
            }else{
                $option = '';
                $birthday = $mapper->createObject($this->_request->getParam('username'), '1900-'.$this->_request->getParam('birthday'));
                if($operation == 'insert'){
                    $mapper->save($birthday);
                    $option = '?id='.$birthday->getId();
                }elseif($operation == 'insert-and-new'){
                    $mapper->save($birthday);
                    //nothing
                }elseif($operation == 'update'){
                    $id = $this->_request->getParam('id');
                    if ($id){
                        $birthday->setId($id);
                    }
                    $mapper->save($birthday);
                    $option = '?id='.$birthday->getId();
                }
                
                Envelopes_Model_Messages::add('Birthday saved.','success');
                $this->_redirect('/envelopes/birthdays/birthday'.$option);
            }
        }else{
            //load or new birthday form
            $id = $this->_request->getParam('id');
            if ($id) {
                //load
                $birthday = $mapper->find($id);
                if (!$birthday) {
                    Envelopes_Model_Messages::add('Id does not exist.', 'error');
                    $birthday = new Envelopes_Model_Birthday('','');
                }
            }
        }        
        $this->view->birthday = $birthday;
        
    }
    
    function deleteAction()
    {
        $id = $this->_request->getParam('id');
        if($id){
            //try to delete
            $mapper = new Envelopes_Model_BirthdayMapper();
            $mapper->delete($id);
            Envelopes_Model_Messages::add('deleted','success');
        }else{
            Envelopes_Model_Messages::add('Missing id','error');
        }
        $this->_redirect('/envelopes/birthdays');
    }
    
    protected function _validateParams(array $params)
    {
        $ok = true;
        if(!isset($params['username'])){
            $ok = false;
            Envelopes_Model_Messages::add('Missing User','error');
        }
        if(!isset($params['birthday']) || $params['birthday'] == ''){
            $ok = false;
            Envelopes_Model_Messages::add('Missing Birthday','error');
        }
        
        return $ok;
    }

}