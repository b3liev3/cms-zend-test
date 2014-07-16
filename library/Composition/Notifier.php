<?php
    namespace Composition {
	abstract class Notifier {

	    static function getNotifier()
	    {
		//acquire concrete class according to configuration or other logic

		if (rand(1, 2) === 1) {
		    return new MailNotifier();
		} else {
		    return new TextNotifier();
		}
	    }

	    abstract function inform($message);
	}
    }