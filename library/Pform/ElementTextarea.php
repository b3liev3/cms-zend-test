<?php
namespace Pform{
class ElementTextarea extends Element
{
    public function __construct($name) {
        parent::__construct($name);
        $this->container = 'p';
        $this->input = "<textarea {$this->getIdTag()} {$this->getClassTag()} {$this->getNameTag()}>{$this->getValue()}</textarea>";
    }
}
}