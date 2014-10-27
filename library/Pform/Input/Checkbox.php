<?php
namespace Pform{
class Input_Checkbox extends Input
{
    protected $_type = 'checkbox';
    
    function render()
    {
        return "<label><input {$this->getAttributes()} type='{$this->_type}' /> {$this->_renderStrategy->getLabel()}</label>";
    }
}
}