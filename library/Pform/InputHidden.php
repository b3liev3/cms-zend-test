<?php
namespace Pform{
class InputHidden extends Input
{
    function __construct($name) {
	$this->_type = 'hidden';
        parent::__construct($name);
    }

    function isValid($value) {
        return true;
    }
}
}