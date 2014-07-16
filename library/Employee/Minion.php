<?php
    namespace Employee {
	class Minion extends Employee{
	    function fire()
	    {
		print "{$this->name}: I'll clear my desk'<br/>";
	    }
	}
    }