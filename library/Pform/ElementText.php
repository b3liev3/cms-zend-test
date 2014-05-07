<?php
namespace Pform{
class ElementText extends Input
{   
    protected $dataType = '';
    
    protected $allowedDataTypes = array(
	'telephone',
	'userId',
	'email',
	'moneyFloat',
	'money',
	'percentage',
	'varchar',
	'currencyId',
	'countryid',
	'countryId',
	'datemssql'
    );
    
    public function setDataType($type)
    {
	if(in_array($type,$this->allowedDataTypes)){
	    $this->dataType = $type;    
	}
	return $this;
    }
    
    public function getDataTypeTag()
    {
	if($this->dataType){
	    return "data-type='{$this->dataType}'";
	}
	return '';
    }
    
    public function __construct($name) {
	$this->type = 'text';
	$this->wrapper = 'p';
        parent::__construct($name);
    }
  
    public function render()
    {
	$this->input = "<input {$this->getDataTypeTag()} {$this->getIdTag()} {$this->getReadOnlyTag()} {$this->getClassTag()} {$this->getValueTag()} {$this->getNameTag()} type='{$this->type}' />";
	return parent::render();
    }
    
}
}