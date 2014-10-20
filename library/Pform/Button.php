<?php
namespace Pform{
    class Button extends FormElement{
	
        protected $_description;
        
	function render()
	{
	    $this->_element = "<button {$this->getAttributes()}>".$this->_description."</button>";
	    return parent::render();
	}
        
        function __construct($name,$description)
        {
            $this->addClass('uk-button');
            $this->_description = $description;
            parent::__construct($name);
        }
        
        function isValid($value) {
            return true;
        }
    }
}