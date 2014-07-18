<?php
    namespace Decorator{
	class Plains extends Tile{
	    private $_wealthfactor = 2;
	    
	    function getWealthFactor()
	    {
		return $this->_wealthfactor;
	    }
	}
}