<?php
namespace Pform{
class ElementSubmit extends Element
{
    public function __construct($name) {
        parent::__construct($name);
        
        $this->input = "<input {$this->getIdTag()} {$this->getClassTag()} {$this->getValueTag()} {$this->getNameTag()} type='submit' />";
    }
    
}
}