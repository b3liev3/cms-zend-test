<?php
namespace Pform{
class Form extends Fieldset
{
    protected $_method = 'POST';
    
    protected $_action;
    
    function setStacked()
    {
        if($this->hasClass('uk-form-horizontal')){
            $this->removeClass('uk-form-horizontal');
        }
        $this->addClass('uk-form-stacked');
    }
    
    /**
     * 
     * @param string $htmlId
     */
    function __construct($htmlId) 
    {
        $this->addClass('uk-form');
        $this->setStacked();
        parent::__construct($htmlId);
    }
    
    function setHorizontal()
    {
        if($this->hasClass('uk-form-stacked')){
            $this->removeClass('uk-form-stacked');
        }
        $this->addClass('uk-form-horizontal');
    }
    
    function setAction($action)
    {
        $this->_action = $action;
    }
    
    function render()
    {
        $html = array();
        
        $html[] = "<form method='{$this->_method}' action='{$this->_action}' {$this->getAttributes()}>";
        $html[] = parent::render();
        $html[] = "</form>";
        
        return implode('',$html);
    }
    
    function __toString() {
        return $this->render();
    }
}
}