<?php
namespace Pform{
class Fieldset extends Html{

    protected $_order = array();

    protected $_elements = array();
    
    protected $_legend = '';
    
    function setLegend($value)
    {
        $this->_legend = $value;
        return $this;
    }
    
    /**
     * 
     * @param string $htmlId
     */
    function __construct($id)
    {
        parent::__construct($id);
    }
    
    protected function _setElements(Html $element)
    {
	if(is_a($element,'Pform\Fieldset')){
	    foreach($element->getElements() as $e){
		$this->_elements[$e->getId()] = $e;
	    }
	}
	$this->_elements[$element->getId()] = $element;
	
	return $this;
    }
    
    function getElements()
    {
        return $this->_elements;
    }
    
    function appendElement(Html $element)
    {
        $this->_order[] = $element->getId();
        $this->_setElements($element);
        return $this;
    }
    
    function prependElement(Html $element)
    {
        $this->_order = array_merge(array($element->getId()),$this->order);
        $this->_setElements($element);
        return $this;
    }
    
    function addElement(Html $element)
    {
       $this->appendElement($element);
       return $this;
    }
    
    function isValid($params)
    {
        $this->setValues($params);
        $error = true;
        foreach($this->_elements as $id => $element){
            if(!isset($params[$id])){
                if($element->isRequired()){
                    $error = false;
                    $element->addClass('empty');
                }
            }else{
                if(empty($params[$id])){
                    if($element->isRequired()){
                    $error = false;
                    $element->addClass('empty');
                    }
                }elseif(!$element->isValid($params[$id])){
                    $error = false;
                    $element->addClass('wrong');
                }
            }
        }
        return $error;
    }
    
    function getValue($id)
    {
        return $this->_elements[$id]->getValue();
    }
    
    function setValues($params)
    {
        foreach($params as $key => $value){
            if(isset($this->_elements[$key])){
                $this->_elements[$key]->setValue($value);
            }
        }
    }
    
    function populate($values = array())
    {
        foreach($values as $key => $val){
            if(isset($this->_elements[$key])){
                $this->_elements[$key]->setValue($val);
            }else{
                throw new Exception('Element does not exist in the form');
            }
        }
    }
    
    function render()
    {
	$h = array();
        $h[] = "<fieldset {$this->getAttributes()}>";
        if(!empty($this->_legend)){
            $h[] = "<legend>{$this->_legend}</legend>";
        }
	if($this->_order){
            foreach($this->_order as $id){
		$h[] = $this->_elements[$id]->render();
            }
        }
	$h[] = '</fieldset>';
        
        return implode('',$h);
    }
}
}