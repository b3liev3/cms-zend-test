<?php
namespace Utilities{
    class Utilities{
	static function pre($var){
	    return '<pre>'.print_r($var,true).'</pre>';
	}
    }
}
