<?php
    namespace Composition {
	class TextNotifier extends Notifier {

	    function inform($message)
	    {
		print "TEXT notification: {$message}";
	    }
	}
    }