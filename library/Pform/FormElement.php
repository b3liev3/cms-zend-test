<?php
namespace Pform{
abstract class FormElement extends Element
{
    protected $label = '';
    
    protected $value = null;
    
    protected $name = '';
    
    protected $input = '';
    
    public function setValue($value)
    {
        $this->value = $value;
	return $this;
    }
    
    public function getValueTag()
    {
        if(empty($this->value)){
            return '';
        }else{
            return "value='{$this->value}'";
        }
    }
    
    public function isValid($value)
    {
        return true;
    }
    
    public function getValue()
    {
        return $this->value;
    }
    
    public function setLabel($value)
    {
        $this->label = $value;
        return $this;
    }
    
    /**
     * 
     * @param string $name
     * @param string $label
     * @param mixed $value
     * @return \Pform\Element
     */
    public function __construct($name)
    {
        $this->setId($name);
        $this->name = $name;
        return $this;
    }
    
    public function setName($value)
    {
        $this->name = $value;
        return $this;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function getNameTag()
    {
        return "name='{$this->name}'";
    }
    
    public function addFilter()
    {
        
    }
    
    public function addFilters()
    {
        
    }
    
    public function addValidator()
    {
        
    }
    
    public function addValidators()
    {
        
    }
    
    protected function getLabel()
    {
        if(empty($this->label)){
            return '';
        }
        $required = '';
        if($this->required){
            $required = '*';
        }
        return "<label for='{$this->getId()}'>{$this->label}{$required}</label>";
    }
    
    public function render()
    {
        if(empty($this->wrapper)){
            return "{$this->getLabel()}
            {$this->input}
                {$this->getMessage()}";
        }else{
            return "<{$this->wrapper}>
                {$this->getLabel()}
                {$this->input}
                    {$this->getMessage()}
                        </$this->wrapper>";
        }
    }

}}