<?php
namespace Pform{
class ElementSubmit extends Input
{
    public function __construct($name) {
	$this->type = 'submit';
        parent::__construct($name);
    }
    
}
}