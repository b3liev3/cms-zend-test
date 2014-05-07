<?php
namespace Pform{
abstract class Element extends Html{

    protected $required = false;

    protected $wrapper = '';

    protected $hasMessage = true;

    protected $readOnly = false;

    public function setReadOnly($default = true)
    {
	$this->readOnly = $default;
	return $this;
    }

    public function isReadOnly()
    {
	return $this->readOnly;
    }

    public function getReadOnlyTag()
    {
	if($this->readOnly){
	    return 'readonly';
	}else{
	    return '';
	}
    }

    public function removeWrapper()
    {
	$this->wrapper = '';
	return $this;
    }

    public function isRequired()
    {
	return $this->required;
    }

    public function setWrapper($value)
    {
	$this->wrapper = $value;
	return $this;
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
    
    public function setRequired($default = true)
    {
        $this->required = $default;
        $this->addClass('required');
        return $this;
    }
}
}