<?php
    namespace Composite {
	class Army extends CompositeUnit {

	    function bombardStrength()
	    {
		$ret = 0;
		foreach ($this->_units as $unit) {
		    //echo get_class($unit).' '.$unit->bombardStrength().'<br/>';
		    $ret += $unit->bombardStrength();
		}
		return $ret;
	    }
	}
    }