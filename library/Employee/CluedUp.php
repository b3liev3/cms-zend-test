<?php
    namespace Employee {
	class CluedUp extends Employee{
	    function fire()
	    {
		print "{$this->name}: I'll call my lawyer.'<br/>";
	    }
	}
    }