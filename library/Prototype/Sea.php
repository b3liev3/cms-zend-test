<?php    
namespace Prototype {
	abstract class Sea{
	   private $_navigability = 0;
	   
	   function __construct($navigability)
	   {
	       $this->_navigability = $navigability;
	   }
	}
    }