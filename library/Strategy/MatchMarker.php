<?php
    namespace Strategy{
	class MatchMarker extends Marker{
	    function mark($response){
		return($this->_test == $response);
	    }
	}
}