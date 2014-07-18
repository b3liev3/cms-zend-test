<?php
    namespace Decorator{
	class PollutionDecorator extends TileDecorator{
	    function getWealthFactor()
	    {
		return $this->_tile->getWealthFactor()-4;
	    }
	}
}