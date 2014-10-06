<?php
class Envelopes_View_Helper_Birthday extends Zend_View_Helper_Abstract{
    
    function birthday(Envelopes_Model_Birthday $birthday)
    {
        $html = array();
        $html[] = "<form method='post' class='uk-form uk-form-stacked'>";
        $html[] = "<input type='hidden' name='id' value='{$birthday->getId()}' />";
        $html[] = $this->_getLegend($birthday);
        $html[] = "<fieldset>";
        $html[] = $this->_getUserList();
        $html[] = $this->_getBirthday();
        $html[] = $this->view->button('Submit');
        $html[] = "</fieldset>";
        $html[] = "</form>";
        return implode('',$html);
    }
    
    protected function _getLegend(Envelopes_Model_Birthday $birthday)
    {
        if($birthday->hasBeenSaved()){
            return "<legend>Edit</legend>";
        }else{
            return "<legend>New Birthday</legend>";
        }
    }
    
    protected function _getUserList()
    {
        return $this->view->usersSelect()->getWithNoBirthdays()->render('Colleagues','username');
    }
    
    protected function _getBirthday()
    {
        $input = "<input placeholder='MM-DD' name='birthday' value='' />";   
        return $this->view->element('Birthday', 'birthday', $input);
    }
    
}