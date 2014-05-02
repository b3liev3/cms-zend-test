<?php
class Form_ElementTextarea extends Form_Element
{
    public function render()
    {
        return parent::render("<textarea {$this->getIdTag()} {$this->getClassTag()} {$this->getNameTag()}>{$this->getValue()}</textarea>");
    }
}