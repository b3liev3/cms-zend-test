<?php
class Envelopes_View_Helper_UsersSelect extends Envelopes_View_Helper_Select{
    
    function usersSelect()
    {
        return $this;
    }
    
    function getAll()
    {
        $mapper = new Envelopes_Model_UserMapper();
        $users = $mapper->findAllRows();
        foreach($users as $u){
            $this->_options[$u['username']] = $u['complete'];
        }
        return $this;
    }
    
    function getWithNoBirthdays()
    {
        $mapper = new Envelopes_Model_UserMapper();
        $users = $mapper->findAllUsersWithNoBirthdays();
        foreach($users as $u){
            $this->_options[$u['username']] = $u['complete'];
        }
        return $this;
    }
    
}