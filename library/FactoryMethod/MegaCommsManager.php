<?php
    namespace FactoryMethod {
	class MegaCommsManager extends CommsManager{
	    function getHeaderText()
	    {
		return "MegaCal header <br/>";
	    }
	    
	    function make($flag_int){
		switch($flag_int){
		    case self::APPT:
			return new MegaApptEncoder();
		    case self::CONTACT:
			return new MegaContactEncoder();
		    case self::TTD:
			return new MegaTtdEncoder();
		}
	    }
	    
	    function getFooterText()
	    {
		return "MegaCal footer <br/>";
	    }
	}
    }