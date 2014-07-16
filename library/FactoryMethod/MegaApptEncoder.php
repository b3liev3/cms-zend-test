<?php
    namespace FactoryMethod {
	class MegaApptEncoder extends ApptEncoder{
	    function encode()
	    {
		return "Appointment data encoded in MegaCal format <br/>";
	    }
	}
    }