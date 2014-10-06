<?php
class Envelopes_Model_Message{
    
    protected $_type = 'info';
    
    protected $_text = '';
    
    function __construct($text)
    {
        $this->_text = $text;
    }
    
    function setInfo()
    {
        $this->_type = 'info';
        return $this;
    }
    
    function setSuccess()
    {
        $this->_type = 'success';
        return $this;
    }
    
    function setWarning()
    {
        $this->_type = 'warning';
        return $this;
    }
    
    function setError()
    {
        $this->_type = 'error';
        return $this;
    }
    
    function render()
    {
        return $this->_type.": {$this->_text}<br/>";
    }
}