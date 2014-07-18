<?php
    namespace Strategy{
	class RegexpMarker extends Marker{
	    function mark($response){
		return (preg_match($this->_test,$response));
	    }
	}
}