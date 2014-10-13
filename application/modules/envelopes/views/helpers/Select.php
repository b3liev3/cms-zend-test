<?php

class Envelopes_View_Helper_Select extends Zend_View_Helper_Abstract {
 
    protected $_value;
    
    protected $_options;
    
    protected $_disabled = false;
    
    function select()
    {
        return $this;
    }
    
    function setSelected($value)
    {
        return $this->setDefaultValue($value);
    }
    
    function setOnlySelected()
    {
        $selected = $this->_options[$this->_value];
        unset($this->_options);
        $this->_options[$this->_value] = $selected;
        return $this;
    }
    
    function setDefaultValue($value)
    {
        $this->_value = $value;
        return $this;
    }
    
    function render($label,$name)
    {
        $html = array();
     
        $disabled = "";
        if($this->_disabled){
            $disabled = "disabled='disabled'";
        }
        $html[] = "<select {$disabled} name='{$name}'>";
        if($this->_options){
            foreach($this->_options as $value => $option){
                $selected = '';
                if($value == $this->_value){
                    $selected = "selected='selected'";
                }
                $html[] = "<option {$selected} value='{$value}'>{$option}</option>";    
            }
        }
        $html[] = "</select>";
        return $this->view->element($label,$name,implode('',$html));
    }
    
    function setDisabled($default = true)
    {
        $this->_disabled = $default;
        return $this;
    }
    
    function addOption($label,$value)
    {
        if(is_null($this->_options)){
            $this->_options = array();
        }
        $this->_options[$value] = $label;
        return $this;
    }
    
    function removeOption($value)
    {
        if(isset($this->_options[$value])){
            unset($this->_options[$value]);
        }
        return $this;
    }
}