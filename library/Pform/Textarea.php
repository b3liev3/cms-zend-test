<?php
namespace Pform{
class Textarea extends FormElement
{
    public function __construct($name) {
        $this->_element = "<textarea {$this->getAttributes()}></textarea>";
        parent::__construct($name);
    }
    
    function isValid($value) {
        return true;
    }
}
}