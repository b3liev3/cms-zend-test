<?php
class Form_ElementText extends Form_Element
{   
    public function render($extra = '')
    {
        return parent::render("<input {$this->getIdTag()} {$this->getClassTag()} {$this->getValueTag()} {$this->getNameTag()} type='text' />");
    }
}
