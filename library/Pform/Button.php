<?php
namespace Pform{
    class Button extends FormElement{
	
        protected $_description;
        
        function __construct($name,$description)
        {
            $this->addClass('uk-button');
            $this->_description = $description;
            parent::__construct($name);
        }
        
	function render()
	{
	    $this->_renderStrategy->setInnerHtml("<button {$this->getAttributes()}>".$this->_description."</button>");
	    return $this->_renderStrategy->render();
	}
        
        function isValid($value) {
            return true;
        }
    }
}