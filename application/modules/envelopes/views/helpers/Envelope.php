<?php
class Envelopes_View_Helper_Envelope extends Zend_View_Helper_Abstract{
    
    function envelope(Envelopes_Model_Envelope $envelope)
    {
        $html = array();
        $html[] = "<form class='uk-form uk-form-stacked'>";
        
        $html[] = "<input type='hidden' name='id' value='{$envelope->getId()}' />";
        
        $html[] = "<legend>Envelope</legend>";
        

        $html[] = "<fieldset>";
        
        $html[] = $this->_getIncharge($envelope);
        $html[] = $this->_getForWhom($envelope);
        $html[] = $this->_getCloseDate($envelope);
        $html[] = $this->_getComments($envelope);
        
        $html[] = "</fieldset>";
        $html[] = "</form>";
        return implode('',$html);
    }
    
    protected function _getIncharge(Envelopes_Model_Envelope $envelope)
    {
        return $this->view->usersSelect()->getAll()->setSelected($envelope->getInCharge())->render('In Charge','incharge');
    }
    
    protected function _getForWhom(Envelopes_Model_Envelope $envelope)
    {   
        return $this->view->usersSelect()->getAll()->setSelected($envelope->getForWhom())->render('For whom','forwhom');
    }
    
    protected function _getCloseDate(Envelopes_Model_Envelope $envelope)
    {
        $input = "<input placeholder='YYYY-MM-DD' data-uk-datepicker='{format:\"YYYY-MM-DD\"}' name='closedate' value='{$envelope->getCloseDate()}' />";   
        return $this->view->element('Close Date', 'closedate', $input);
    }
    
    protected function _getComments(Envelopes_Model_Envelope $envelope)
    {
        $input = "<input type='text' name='comments' value='{$envelope->getComments()}' />";   
        return $this->view->element('Comments', 'comments', $input);
    }
    
    
}


    