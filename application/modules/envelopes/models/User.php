<?php
class Envelopes_Model_User{
    
    protected $_id;
    
    protected $_rights;
    
    protected $_completeName;
    
    protected $_hasEnvelope;
    
    function __construct($id,array $rights,$completeName,$hasEnvelope)
    {
        $this->_id = $id;
        $this->_rights = $rights;
        $this->_completeName = $completeName;
        $this->_hasEnvelope = $hasEnvelope;
    }
    
    function hasEnvelope()
    {
        return $this->_hasEnvelope;
    }
    
    function setHasEnvelope($default = true)
    {
        $this->_hasEnvelope = $default;
        return $this;
    }
    
    function getId()
    {
        return $this->_id;
    }
    
    function hasRight($right)
    {
        return in_array($right,$this->_rights);
    }
    
    function getCompleteName()
    {
        return $this->_completeName;
    }
    
    function getComplete()
    {
        return $this->getCompleteName();
    }
    
    function isSuperAdmin()
    {
        if(in_array('superadmin',$this->_rights)){
            return true;
        }
        return false;
    }
}