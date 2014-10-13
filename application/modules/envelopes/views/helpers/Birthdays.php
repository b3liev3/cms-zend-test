<?php
class Envelopes_View_Helper_Birthdays extends Zend_View_Helper_Abstract{
    
    protected $_user;
    
    function birthdays(array $rows)
    {
        $this->_user = Zend_Registry::get('user');

        /*
         [YEAR] => 2014
    [birthdayid] => 23
    [id] => 
    [username] => gesparza
    [birthday] => 1900-03-03
    [envelopeid] => 
    [incharge] => 
    [forwhom] => 
    [closedate] => 
    [comments] => 
    [year] => 
    [type] => 
    [complete] => Gabriel Esparza
    [has_envelope] => 1
         */
        
        $html = array();
        $html[] = "<table class='uk-table uk-table-condensed uk-table-striped'>";
        $html[] = $this->_getHeader();
        $html[] = $this->_getBody($rows);
        $html[] = "</table>";
        return implode('',$html);
    }
    
    protected function _getHeader()
    {
        $html = array();
        $html[] = "<thead>";
        $html[] = "<tr>";
        $html[] = "<th>Birthday</th>";
        $html[] = "<th>Year</th>";
        $html[] = "<th>Colleague</th>";
        $html[] = "<th>Edit</th>";
        $html[] = "<th>Envelope</th>";
        if($this->_user->isSuperAdmin()){
            $html[] = "<th>Delete</th>";
        }
        $html[] = "</tr>";
        $html[] = "</thead>";
        return implode('',$html);
    }
    
    protected function _getBody(array $rows)
    {
        $html = array();
        $html[] = "<tbody>";
        foreach($rows as $row){
            $html[] = $this->_getRow($row);
        }
        $html[] = "</tbody>";
        return implode('',$html);
    }
    
    protected function _getRow($row)
    {
        $html = array();
        $html[] = "<tr>";
        //birthday
        $html[] = "<td>".$this->_getBirthday($row['birthday'])."</td>";
        //year
        $html[] = "<td>".$row['YEAR']."</td>";
        //complete
        $html[] = "<td>{$row['complete']}</td>";
        //edit
        $html[] = "<td>".$this->_getEdit($row['birthdayid'],$row['username'])."</td>";
        //create envelope
        $html[] = "<td>".$this->_getCreateEnvelope($row['birthdayid'],$row['username'],$row['envelopeid'])."</td>";
        if($this->_user->isSuperAdmin()){
            //delete
            $html[] = "<td>".$this->_getBin($row['birthdayid'])."</td>";
        }
        $html[] = "</tr>";
        return implode('',$html);
    }
    
    protected function _getBin($id)
    {
        return "<a class='uk-button uk-text-primary ' href='{$this->view->baseUrl()}/envelopes/birthdays/delete?id={$id}'><i class='uk-icon-trash'></i></a>";
    }
    
    protected function _getBirthday($date)
    {
        if($date){
            $aux = explode('-',$date);
            unset($aux[0]);
            return implode('-',$aux);
        }
        return '';
    }
    
    protected function _getEdit($id,$username)
    {
        if($this->_user->isSuperAdmin() || $this->_user->getId() == $username){
            return "<a href='{$this->view->baseUrl()}/envelopes/birthdays/birthday?id={$id}' title='Edit' data-uk-tooltip class='uk-button uk-text-primary'><i class='uk-icon-edit'></i></a>";
        }else{
            return '';
        }
        
    }
    
    protected function _getCreateEnvelope($id,$username,$envelopeid)
    {
        if($this->_user->getId() == $username){
            return '<button class="uk-button" disabled><i class="uk-icon-eye-slash"></i></button>';
        }else{
            if($envelopeid){
                return "<a href='{$this->view->baseUrl()}/envelopes/envelope/edit?id={$envelopeid}' >envelope</a>";
            }
            return $this->_makeSubForm($username);
        }
    }
    
    protected function _makeSubForm($forwhom)
    {
        $html = array();
        $html[] = "<form method='post' action='{$this->view->baseUrl()}/envelopes/envelope'>";
        $html[] = "<input type='hidden' name='type' value='BIRTHDAY' />";
        $html[] = "<input type='hidden' name='forwhom' value='{$forwhom}' />";
        $html[] = "<button title='Create Envelope' name='create' value='insert' data-uk-tooltip class='uk-button uk-text-primary'><i class='uk-icon-envelope-o'></i></a>";
        $html[] = "</form>";
        return implode('',$html);
        
    }
}