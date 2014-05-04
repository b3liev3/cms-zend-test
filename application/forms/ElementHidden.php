<?php
class Form_ElementHidden extends Form_Element
{
    public function render($extra = '')
    {
        return parent::render("<input {$this->getIdTag()} {$this->getClassTag()} {$this->getValueTag()} {$this->getNameTag()} type='hidden' />");
    }
}