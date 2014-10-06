<?php
class Envelopes_View_Helper_UsersSelect extends Zend_View_Helper_Abstract{
    
    protected $_rows;
    
    protected $_selected;
    
    function setSelected($value)
    {
        $this->_selected = $value;
        return $this;
    }
    
    function usersSelect()
    {
        return $this;
    }
    
    function getAll()
    {
        $mapper = new Envelopes_Model_UserMapper();
        $this->_rows = $mapper->findAllRows();
        return $this;
    }
    
    function getWithNoBirthdays()
    {
        $mapper = new Envelopes_Model_UserMapper();
        $this->_rows = $mapper->findAllUsersWithNoBirthdays();
        return $this;
    }
    
    function render($label,$name)
    {
        $html = array();
        $html[] = "<select name='{$name}'>";
        if($this->_rows){
            foreach($this->_rows as $row){
                $selected = '';
                if($row['username'] == $this->_selected){
                    $selected = "selected='selected'";
                }
                $html[] = "<option {$selected} value='{$row['username']}'>{$row['complete']}</option>";    
            }
        }
        $html[] = "</select>";
        return $this->view->element($label,$name,implode('',$html));
    }
    
}