<?php
    namespace Employee {
	class WellConnected extends Employee{
	    function fire()
	    {
		print "{$this->name}: I'll call my father.'<br/>";
	    }
	}
    }