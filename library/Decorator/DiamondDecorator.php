<?php
    namespace Decorator{
	class DiamondDecorator extends TileDecorator{
	    function getWealthFactor()
	    {
		return $this->_tile->getWealthFactor()+2;
	    }
	}
}