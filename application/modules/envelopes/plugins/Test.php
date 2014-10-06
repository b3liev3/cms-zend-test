<?php

class Envelopes_Plugin_Test extends Zend_Controller_Plugin_Abstract {

    function __construct()
    {

    }

    public function preDispatch(Zend_Controller_Request_Abstract $request) {
        $login = new Zend_Session_Namespace('Login');
        $login->setExpirationSeconds('60');
        if(!isset($login->user)){
            $request->setModuleName('envelopes')->setControllerName('index')->setActionName('login');
        }
    }

}