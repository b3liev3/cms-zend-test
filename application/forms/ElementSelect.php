<?php
class Form_ElementSelect extends Form_Element
{
    protected $options = array();
    
    public function setOptions($options = array())
    {
        $this->options = $options;
        return $this;
    }
    
    protected function renderOptions()
    {
        $html = array();
        
        foreach($this->options as $value => $description)
        {
            $selected = '';
            if($this->value == $value){
                $selected = "selected='selected'";
            }
            $html[] = "<option {$selected} value='{$value}'>{$description}</option>";
        }
        return implode('',$html);
    }
    
    public function render()
    {
        return parent::render("<select {$this->getIdTag()} {$this->getClassTag()} {$this->getNameTag()}>{$this->renderOptions()}</select>");
    }
}