<?php
class AccountController extends Zend_Controller_Action
{
    public function init()
    {
        
    }
    
    public function indexAction()
    {
        
    }
    
    public function successAction()
    {

        if($this->_request->isPost()){
            $email = $this->_request->getParam("email");
            $username = $this->_request->getParam("username");
            $password = $this->_request->getParam("password");
            echo 'hi'; exit;
        }else{
            throw new Exception('here');
        }

        
        //save the user
    }
    
    public function newAction()
    {
        
    }
    
    /**
     * Activate the account
     */
    public function activateAction()
    {
        $emailToActivate = $this->_request->getParam("email");
    }
    
    public function updateAction()
    {
    
        
    }
    
    public function signupAction()
    {
        
    }
    
}