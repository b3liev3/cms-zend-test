<?php
namespace Pform{
    abstract class Input extends FormElement{
	
	protected $_type;

	function render()
	{
	    $this->_innerHtml = "<input {$this->getAttributes()} type='{$this->_type}' />";
	    return parent::render();
	}
        
    }
}