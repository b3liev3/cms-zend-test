<?php
class Envelopes_Model_Birthday{
    protected $_id = -1;
    
    protected $_username;
    
    protected $_complete;
    
    protected $_date;
    
    function __construct($username,$complete,$date)
    {
        $this->_username = $username;
        $this->_complete = $complete;
        $this->_date = $date;
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
    
    function setComplete($value)
    {
        $this->_complete = $value;
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