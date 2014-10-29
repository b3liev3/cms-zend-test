<?php
namespace Pform{
class Input_Checkbox extends Input
{
    protected $_type = 'checkbox';
    
    protected $_checkboxLabel = '';
    
    function __construct($name, $value,$label) {
        $this->_value = $value;
        $this->_addAttribute('value',$value);
	$this->_checkboxLabel = $label;
        parent::__construct($name, '');
    }
    
    function setValue($value) {
        if($value == $this->_value){
            $this->_addAttribute('checked','checked');
        }
    }
    
    function render()
    {
	$this->_renderStrategy->setInnerHtml("<label><input {$this->getAttributes()} type='{$this->_type}' /> {$this->_checkboxLabel}</label>");
        return $this->_renderStrategy->render();
    }
}
}