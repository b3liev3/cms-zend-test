<?php
namespace Pform{
    class Input extends FormElement{
	
	protected $type;

	public function render()
	{
	    if(empty($this->input)){
		$this->input = "<input {$this->getIdTag()} {$this->getReadOnlyTag()} {$this->getClassTag()} {$this->getValueTag()} {$this->getNameTag()} type='{$this->type}' />";
	    }
	    return parent::render();
	}
    }
}