<?php
namespace Pform{
class Container extends Element{

    protected $order = array();

    protected $elements = array();
    
    protected $header = '';
    
    public function getHeader()
    {
	return $this->header;
    }
    
    public function setHeader($value)
    {
	$this->header = $value;
	return $this;
    }
    
    public function hasHeader()
    {
	if(empty($this->header)){
	    return false;
	}
	return true;
    }

    /**
     * 
     * @param string $htmlId
     */
    public function __construct($htmlId)
    {
	$this->wrapper = 'div';
	$this->id = $htmlId;
    }
    
    public function appendElement(Element $element)
    {
        $this->order[] = $element->getId();
        $this->setElements($element);
        return $this;
    }
    
    protected function setElements(Element $element)
    {
	if(is_a($element,'Pform\Container')){
	    foreach($element->getElements() as $e){
		$this->elements[$e->getId()] = $e;
	    }
	}
	$this->elements[$element->getId()] = $element;
	
	return $this;
    }
    
    public function prependElement(Element $element)
    {
        $this->order = array($element->getId()) + $this->order;
        $this->setElements($element);
        return $this;
    }
    
    public function addElement(Element $element)
    {
       $this->appendElement($element);
       return $this;
    }
    
    public function getElement($id)
    {
        return $this->elements[$id];
    }
    
    public function getElements()
    {
	return $this->elements;
    }
    
    public function isValid(array $params)
    {
        $this->setValues($params);
        $return = true;
        foreach($this->elements as $id => $element){
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
        return $this->elements[$id]->getValue();
    }
    
    public function setValues($params)
    {
        foreach($params as $key => $value){
            if(isset($this->elements[$key])){
                $this->elements[$key]->setValue($value);
            }
        }
    }
    
    public function populate($values = array())
    {
        foreach($values as $key => $val){
            if(isset($this->elements[$key])){
                $this->elements[$key]->setValue($val);
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
    
    public function render()
    {
	$inner = array();
	if($this->hasHeader()){
	    $inner[] = "<p class='header'>{$this->header}</p>";
	}
	if($this->order){
            foreach($this->order as $id){
		$inner[] = $this->elements[$id]->render();
            }
        }
	
	if(empty($this->wrapper)){
	    return implode('',$inner);
	}else{
	    $html = array();
	    $html[] = "<{$this->wrapper} {$this->getIdTag()} {$this->getClassTag()}>";
	    $html[] = implode('',$inner);
	    $html[] = "</{$this->wrapper}>";
	    return implode('',$html);
	}
	
    }
}
}