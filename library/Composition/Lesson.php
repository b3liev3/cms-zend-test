<?php
    namespace Composition {
	abstract class Lesson {
	    private $_duration;
	    private $_costStrategy;

	    function __construct($duration, CostStrategy $strategy)
	    {
		$this->_duration = $duration;
		$this->_costStrategy = $strategy;
	    }

	    function cost()
	    {
		return $this->_costStrategy->cost($this);
	    }
	    
	    function chargeType(){
		return $this->_costStrategy->chargeType();
	    }
	    
	    function getDuration(){
		return $this->_duration;
	    }
	    
	    // more lesson methods...
	}
    }