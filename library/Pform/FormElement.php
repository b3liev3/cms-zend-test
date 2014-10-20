<?php
namespace Pform{
abstract class FormElement extends Html
{
    protected $_label = '';
    
    protected $_value = null;
    
    protected $_name = '';
    
    protected $_element = '';
    
    protected $_required = false;
    
    function setReadOnly($default = true)
    {
	if($default){
            $this->_addAttribute('readonly');
        }else{
            $this->_removeAttribute('readonly');
        }
        return $this;
    }

    function isRequired()
    {
	return $this->_required;
    }
    
    function setRequired($default = true)
    {
        if($default){
            $this->_addAttribute('required');
        }else{
            $this->_removeAttribute('required');
        }
        return $this;
    }
    
    function setDisabled($default = false)
    {
        if($default){
            $this->_addAttribute('disabled');
        }else{
            $this->_removeAttribute('disabled');
        }
        return $this;
    }
    
    function setValue($value)
    {
        $this->_addAttribute('value',$value);
	return $this;
    }
    
    abstract function isValid($value);
    
    
    function getValue()
    {
        return $this->_attributes['value'];
    }
    
    function setLabel($value)
    {
        $this->_label = $value;
        return $this;
    }
    
    function __construct($name)
    {
        parent::__construct($name);
        $this->_addAttribute('name',$name);
        return $this;
    }
    
    function getName()
    {
        return $this->_attributes['name'];
    }
    
    protected function _getLabel()
    {
        if(empty($this->_label)){
            return '';
        }
        $required = '';
        if($this->isRequired()){
            $required = '<i data-uk-tooltip title="required">*</i>';
        }
        return "<label class='uk-form-label' for='{$this->getId()}'>{$this->_label}{$required}</label>";
    }
    
    function __toString()
    {
        return $this->render();
    }
    
    function render()
    {
        $h = array();
        $h[] = "<div class='uk-form-row'>";
            if($this->_label){
                $h[] = $this->_getLabel();
            }
            $h[] = "<div class='uk-form-controls'>";
            $h[] = $this->_element;
            $h[] = "</div>";
        $h[] = "</div>";
        return implode('',$h);
    }

}}