<?php
class Envelopes_View_Helper_Birthday extends Zend_View_Helper_Abstract{
    
    function birthday(Envelopes_Model_Birthday $birthday)
    {
        $html = array();
        $html[] = "<form method='post' class='uk-form uk-form-stacked'>";
        $html[] = "<input type='hidden' name='id' value='{$birthday->getId()}' />";
        $html[] = $this->_getLegend($birthday);
        $html[] = "<fieldset>";
        $html[] = $this->_getUserList($birthday);
        $html[] = $this->_getBirthday($birthday);
        $html[] = $this->_getButtons();
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
    
    protected function _getButtons()
    {
        if(isset($_GET['id'])){
            //update
            return $this->view->button('Update','operation','update');
        }else{
            $html = array();
            $html[] = '<div class="uk-form-row">';
            $html[] = '<button name="operation" value="insert-and-new" class="uk-button">Insert and add another Birthday</button>';
            $html[] = ' <button name="operation" value="insert" class="uk-button">Insert</button>';
            $html[] = '</div>';
            return implode('',$html);
        }
    }
    
    protected function _getUserList(Envelopes_Model_Birthday $birthday)
    {
        if($birthday->getUsername()){
            return $this->view->usersSelect()
                ->getWithNoBirthdays()
                ->addOption($birthday->getComplete(),$birthday->getUsername())
                ->setDefaultValue($birthday->getUsername())
                ->render('Colleagues','username');
        }else{
            return $this->view->usersSelect()
                ->getWithNoBirthdays()
                ->render('Colleagues','username');
        }
    }
    
    protected function _getBirthday(Envelopes_Model_Birthday $birthday)
    {
        $input = "<input placeholder='MM-DD' name='birthday' value='{$birthday->getDate()}' />";   
        return $this->view->element('Birthday', 'birthday', $input);
    }
    
}