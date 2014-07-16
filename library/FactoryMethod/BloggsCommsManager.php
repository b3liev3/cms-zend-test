<?php
    namespace FactoryMethod {
	class BloggsCommsManager extends CommsManager{
	    function getHeaderText()
	    {
		return "BloggsCal header <br/>";
	    }
	    
	    function make($flag_int){
		switch($flag_int){
		    case self::APPT:
			return new BloggsApptEncoder();
		    case self::CONTACT:
			return new BloggsContactEncoder();
		    case self::TTD:
			return new BloggsTtdEncoder();
		}
	    }
	    
	    function getFooterText()
	    {
		return "BloggsCal footer <br/>";
	    }
	}
    }