<?php
namespace Pform{
class Form extends Html
{
    protected $method = 'POST';
    
    protected $action;
    
    protected $elements = array();
    
    protected $elementsIds = array();
    
    public function __construct($action)
    {
        $this->action = $action;
        return $this;
    }
    
    public function appendElement(Element $element)
    {
        $this->elements[] = $element;
        $this->elementsIds[$element->getId()] = $element;
        return $this;
    }
    
    public function prependElement(Element $element)
    {
        $this->elements = array($element) + $this->elements;
        $this->elementsIds[$element->getId()] = $element;
        return $this;
    }
    
    public function addElement(Element $element)
    {
       $this->appendElement($element);
       return $this;
    }
    
    public function getElement($id)
    {
        return $this->elementsIds[$id];
    }
    
    public function setAction($action)
    {
        $this->action = $action;
    }
    
    public function isValid(array $params)
    {
        $this->setValues($params);
        $return = true;
        foreach($this->elementsIds as $id => $element){
            if(!isset($params[$id])){
                if($element->isRequired()){
                    $return = false;
                    $element->addClass('empty');
                }
            }else{
                if(empty($params[$id])){
                    if($element->isRequired()){
                    $return = false;
                    $element->addClass('empty');
                    }
                }elseif(!$element->isValid($params[$id])){
                    $return = false;
                    $element->addClass('wrong');
                }
            }
        }
        return $return;
    }
    
    public function getValue($id)
    {
        return $this->elementsIds[$id]->getValue();
    }
    
    public function setValues($params)
    {
        foreach($params as $key => $value){
            if(isset($this->elementsIds[$key])){
                $this->elementsIds[$key]->setValue($value);
            }
        }
    }
    
    public function render()
    {
        $html = array();
        
        $html[] = "<form method='{$this->method}' action='{$this->action}' {$this->getIdTag()} {$this->getClassTag()}>";
        if($this->elements){
            foreach($this->elements as $element){
                $html[] = $element->render();
            }
        }
        $html[] = "</form>";
        
        return implode('',$html);
    }
        
    public function populate($values = array())
    {
        foreach($values as $key => $val){
            if(isset($this->elementsIds[$key])){
                $this->elementsIds[$key]->setValue($val);
            }else{
                echo $key; exit;
                throw new Exception('Element does not exist in the form');
            }
        }
    }
    
    public function __toString()
    {
        return $this->render();
    }
}
}