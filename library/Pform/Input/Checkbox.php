<?php
namespace Pform{
class Input_Checkbox extends Input
{
    protected $_type = 'checkbox';
    
    function __construct($name, $value,$label) {
        $this->_value = $value;
        $this->_addAttribute('value',$value);
        parent::__construct($name, $label);
    }
    
    function setValue($value) {
        if($value == $this->_value){
            $this->_addAttribute('checked','checked');
        }
    }
    
    function render()
    {
        return "<label><input {$this->getAttributes()} type='{$this->_type}' /> {$this->_renderStrategy->getLabel()}</label>";
    }
}
}