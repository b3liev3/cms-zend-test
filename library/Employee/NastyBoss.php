<?php
    namespace Employee {
	class NastyBoss {
	    private $_employees = array();
	    
	    function addEmployee(\Employee\Employee $employee)
	    {
		$this->_employees[] = $employee;
	    }

	    function projectFails()
	    {
		if(count($this->_employees)){
		    
		    $emp = array_pop($this->_employees);
		    $emp->fire();
		}
	    }
	}
    }