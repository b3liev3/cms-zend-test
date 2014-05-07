<?php
namespace Pform{
abstract class Html
{
    protected $class = array();
    
    protected $id = '';
    
    public function getId()
    {
        return $this->id;
    }
    
    public function setId($value)
    {
        $this->id = $value;
        return $this;
    }
    
    public function addClass($value)
    {
        $this->class[] = $value;
        return $this;
    }
    
    public function getClass()
    {
        return $this->class;
    }
    
    public function hasClass($value)
    {
        if(in_array($value,$this->class)){
            return true;
        }
        return false;
    }
    
    public function getClassTag()
    {
        if($this->class){
            $aux = implode(' ',$this->class);
            return "class='{$aux}'";
        }
        return '';
    }
    
    public function getIdTag()
    {
        if(empty($this->id)){
            return '';
        }else{
            return "id='{$this->id}'";
        }
    }
    
    abstract function render();
}
}