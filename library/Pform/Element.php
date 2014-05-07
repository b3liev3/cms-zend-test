<?php
namespace Pform{
abstract class Element extends Html
{
    protected $label = '';
    
    protected $value = null;
    
    protected $required = false;
    
    protected $container = '';
    
    protected $name = '';
    
    protected $input = '';
    
    protected $hasMessage = true;
    
    public function removeContainer()
    {
        $this->container = '';
        return $this;
    }
    
    public function setValue($value)
    {
        $this->value = $value;
    }
    
    public function getValueTag()
    {
        if(empty($this->value)){
            return '';
        }else{
            return "value='{$this->value}'";
        }
    }
    
    public function isRequired()
    {
        return $this->required;
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
    
    public function setContainer($value)
    {
        $this->container = $value;
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
    
    public function setRequired($default = true)
    {
        $this->required = $default;
        $this->addClass('required');
        return $this;
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
    
    protected function getMessage()
    {
        if($this->hasMessage){
            $message = '';
            if($this->hasClass('empty')){
                $message = 'This is field is required';
            }
            return "<span class='message'>{$message}</span>";
        }
    }
    
    public function render()
    {
        if(empty($this->container)){
            return "{$this->getLabel()}
            {$this->input}
                {$this->getMessage()}";
        }else{
            return "<{$this->container}>
                {$this->getLabel()}
                {$this->input}
                    {$this->getMessage()}
                        </$this->container>";
        }
    }

}}