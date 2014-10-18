<?php
class Envelopes_Model_Birthday{
    
    protected $_id = -1;
    
    protected $_username;
    
    protected $_date;
    
    protected $_complete;
    
    function __construct($username,$date,$complete = null)
    {
        $this->_username = $username;
        $this->_date = $date;
        if($complete){
            $this->_complete = $complete;
        }
    }
    
    function setId($value)
    {
        $this->_id = $value;
        return $this;
    }
    
    function setUsername($value)
    {
        $this->_username = $value;
        return $this;
    }
    
    function setDate($value)
    {
        $this->_date = $value;
        return $this;
    }
    
    function getId()
    {
        return $this->_id;
    }
    
    function getUsername()
    {
        return $this->_username;
    }
    
    function getComplete()
    {
        if(is_null($this->_complete)){
            $mapper = new Envelopes_Model_UserMapper();
            $user = $mapper->findRow($this->_username);
            return $user['complete'];
        }
        return $this->_complete;
    }
    
    function getDate()
    {
        return $this->_date;
    }
    
    function hasBeenSaved()
    {
        if($this->_id == -1){
            return false;
        }
        return true;
    }
}