<?php

class Envelopes_TestController extends MyLibrary_Controller_Action {

    /**
     * 
     */
    function indexAction()
    {
       $this->view->params = $this->_request->getParams();    
    }
    
    function allTypesAction()
    {
        
    }
}