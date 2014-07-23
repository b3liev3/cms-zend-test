<?php
    namespace Utilities {
	class Utilities {

	    static function pre($var)
	    {
		return '<pre>' . print_r($var, true) . '</pre>';
	    }

	    static function stripNamespaceFromClassName($obj)
	    {
		$classname = get_class($obj);

		if (preg_match('@\\\\([\w]+)$@', $classname, $matches)) {
		    $classname = $matches[1];
		}

		return $classname;
	    }
	}
    }
