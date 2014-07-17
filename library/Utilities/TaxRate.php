<?php
namespace Utilities{
    trait TaxRate{

	private $taxrate = 17;

	function calculateTax($price){
	    return (($this->taxrate/100) * $price);
	}
    }
}