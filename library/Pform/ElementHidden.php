<?php
namespace Pform{
class ElementHidden extends Element
{
    public function __construct($name) {
        parent::__construct($name);
        $this->input = "<input {$this->getIdTag()} {$this->getClassTag()} {$this->getValueTag()} {$this->getNameTag()} type='hidden' />";

    }

}
}