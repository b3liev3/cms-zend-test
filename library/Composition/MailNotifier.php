<?php
    namespace Composition {
	class MailNotifier extends Notifier {

	    function inform($message)
	    {
		print "MAIL notification: {$message}";
	    }
	}
    }