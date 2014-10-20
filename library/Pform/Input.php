<?php
namespace Pform{
    abstract class Input extends FormElement{
	
	protected $_type;

	function render()
	{
	    $this->_element = "<input {$this->getAttributes()} type='{$this->_type}' />";
	    return parent::render();
	}
        
        function __construct($name)
        {
            parent::__construct($name);
        }
    }
}