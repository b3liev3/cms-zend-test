<?php
class Form_ElementSubmit extends Form_Element
{
    public function render()
    {
        $this->setLabel('');
        return parent::render("<input {$this->getIdTag()} {$this->getClassTag()} {$this->getValueTag()} {$this->getNameTag()} type='submit' />");
    }
}