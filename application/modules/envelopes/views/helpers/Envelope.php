<?php
class Envelopes_View_Helper_Envelope extends Zend_View_Helper_Abstract{
    
    protected $_editing = false;
    
    function envelope(Envelopes_Model_Envelope $envelope)
    {
        if(isset($_GET['id'])){
            $this->_editing = true;
        }
        
        $html = array();
        $html[] = "<form class='uk-form uk-form-stacked'>";
        
        $html[] = "<input type='hidden' name='id' value='{$envelope->getId()}' />";
        
        $html[] = "<legend>Envelope</legend>";
        

        $html[] = "<fieldset>";
        $html[] = $this->_getType($envelope);
        $html[] = $this->_getIncharge($envelope);
        $html[] = $this->_getForWhom($envelope);
        $html[] = $this->_getCloseDate($envelope);
        $html[] = $this->_getComments($envelope);
        
        $html[] = "</fieldset>";
        $html[] = "</form>";
        return implode('',$html);
    }
    
    protected function _getType(Envelopes_Model_Envelope $envelope)
    {
        if($envelope->getType() == 'BIRTHDAY'){
            $type = $this->view->select()->addOption('Birthday','BIRTHDAY')->setSelected('birthday');
        }else{
            $type = $this->view->envelopeType();
        }
        
        if($this->_editing){
            $type->setDisabled();
        }    
        return $type->render('Type','type');
    }
    
    protected function _getIncharge(Envelopes_Model_Envelope $envelope)
    {
        $user = Zend_Registry::get('user');
        $usersSelect = $this->view->usersSelect();
        if($user->isSuperAdmin()){
            $usersSelect = $usersSelect->getAll()->setSelected($envelope->getInCharge());
        }else{
            $usersSelect->addOption($user->getComplete(),$user->getId())->setSelected($user->getId());
        }
        return $usersSelect->render('In Charge','incharge');
    }
    
    protected function _getForWhom(Envelopes_Model_Envelope $envelope)
    {   
        $user = Zend_Registry::get('user');
        $usersSelect = $this->view->usersSelect()->getAll()->removeOption($user->getId())->setSelected($envelope->getForWhom());
        if($envelope->getType() == 'BIRTHDAY'){
            $usersSelect->setOnlySelected();
        }
        if($this->_editing){
            $usersSelect->setDisabled();
        }
        return $usersSelect->render('For whom','forwhom');
    }
    
    protected function _getCloseDate(Envelopes_Model_Envelope $envelope)
    {
        $input = "<input placeholder='YYYY-MM-DD' data-uk-datepicker='{format:\"YYYY-MM-DD\"}' name='closedate' value='{$envelope->getCloseDate()}' />";   
        return $this->view->element('Close Date', 'closedate', $input);
    }
    
    protected function _getComments(Envelopes_Model_Envelope $envelope)
    {
        $input = "<textarea class='uk-form-width-large' name='comments'>{$envelope->getComments()}</textarea>";   
        return $this->view->element('Comments', 'comments', $input);
    }
    
    
}


    