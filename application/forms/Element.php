<?php
abstract class Form_Element extends Form_Html
{
    protected $label = '';
    
    protected $value = null;
    
    protected $required = false;
    
    protected $container = 'p';
    
    protected $name = '';
    
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
    
    public function setDefaultContainer($value)
    {
        $this->container = $value;
    }    
    
    public function __construct($id,$label = '',$value = null)
    {
        $this->setId($id);
        $this->name = $id;
        $this->label = $label;
        $this->value = $value;
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
    
    public function render($extra = '')
    {
        $required = '';
        if($this->required){
            $required = '*';
        }
        $message = '';
        if($this->hasClass('empty')){
            $message = 'This is field is required';
        }
        return "<{$this->container}><label for='{$this->getId()}'>{$this->label}{$required}</label>{$extra}<span class='message'>{$message}</span></$this->container>";
    }

}