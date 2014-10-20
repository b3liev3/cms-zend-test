<?php
namespace Pform{
class InputText extends Input
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
    
    function setDataType($type)
    {
	if(in_array($type,$this->allowedDataTypes)){
	    $this->_attributes['datatype'] = $type;    
	}
	return $this;
    }
    
    function __construct($name) {
	$this->_type = 'text';
        parent::__construct($name);
    }
  
    function isValid($value) {
        return true;
    }
    
}
}