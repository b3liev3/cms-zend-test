<?php
class Envelopes_Model_Message{
    
    protected $_type = '';
    
    protected $_text = '';
    
    function __construct($text)
    {
        $this->_text = $text;
    }
    
    function setInfo()
    {
        $this->_type = '';
        return $this;
    }
    
    function setSuccess()
    {
        $this->_type = 'uk-alert-success';
        return $this;
    }
    
    function setWarning()
    {
        $this->_type = 'uk-alert-warning';
        return $this;
    }
    
    function setError()
    {
        $this->_type = 'uk-alert-danger';
        return $this;
    }
    
    function render()
    {
        return '<div class="uk-alert '.$this->_type.'">
            <a href="" class="uk-alert-close uk-close"></a>'.
                $this->_text.'</div>';
    }
}