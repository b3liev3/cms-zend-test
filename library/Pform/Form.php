<?php
namespace Pform{
class Form extends Container
{
    protected $method = 'POST';
    
    protected $action;
    
    public function setAction($action)
    {
        $this->action = $action;
    }
    
    public function render()
    {
        $html = array();
        
        $html[] = "<form method='{$this->method}' action='{$this->action}' {$this->getIdTag()} {$this->getClassTag()}>";
        $html[] = parent::render();
        $html[] = "</form>";
        
        return implode('',$html);
    }
    
}
}