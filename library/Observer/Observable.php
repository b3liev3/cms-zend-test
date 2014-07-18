<?php
    namespace Observer{
	interface Observable{
	    function attach(Observer $observer);
	    function detach(Observer $observer);
	    function notify();
    }
}