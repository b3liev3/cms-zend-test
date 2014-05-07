<?php
namespace Pform{
class ElementText extends Element
{   
    public function __construct($name) {
        parent::__construct($name);
        $this->container = 'p';
        $this->input = "<input {$this->getIdTag()} {$this->getClassTag()} {$this->getValueTag()} {$this->getNameTag()} type='text' />";
    }
}
}