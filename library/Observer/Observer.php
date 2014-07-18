<?php
    namespace Observer{
	interface Observer{
	    function update(Observable $observable);
    }
}