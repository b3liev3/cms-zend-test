<?php
    
    namespace Composite{
	/**
	 * The TroopCarrier can carry units but doesn't have any bombardier power
	 */
	class TroopCarrier extends CompositeUnit
	{
	    function bombardStrength(){
		return 0;
	    }
	}
}