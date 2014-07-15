<?php
    namespace Composition {
	class RegistrationMgr {
	    function register(Lesson $lesson){
		//do something with this Lesson
		//now tell someone
		$notifier = Notifier::getNotifier();
		$notifier->inform("new lesson: lesson charge {$lesson->cost()} and Charge type {$lesson->chargeType()}.<br/>");
	    }
	}
    }