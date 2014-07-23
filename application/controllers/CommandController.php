<?php

class CommandController extends Zend_Controller_Action
{

    function indexAction()
    {
	echo '<h1>Command</h1>';
	echo "See the patter in it's folder.";
	exit;
    }

}
