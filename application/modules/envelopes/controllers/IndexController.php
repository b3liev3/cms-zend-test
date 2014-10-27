<?php

class Envelopes_IndexController extends MyLibrary_Controller_Action {

    /**
     * Create or modify existing envelope
     */
    function indexAction() {
        $userMapper = new Envelopes_Model_UserMapper();
        $userMapper->find('ppages');
    }

    /**
     * Login page
     */
    function loginAction() {

        $id = $this->_request->getParam('user');

        if ($id) {
            $mapper = new Envelopes_Model_UserMapper();
            $user = $mapper->find($id);
            if ($user) {
                if ($this->_request->getParam('user') == $this->_request->getParam('password')) {
                    Envelopes_Model_Messages::add('Logged', 'success');
                    $session = new Zend_Session_Namespace('Envelopes');
                    $session->user = $user;
                    $url = $session->redirectTo;
                    unset($session->redirectTo);
                    $this->_redirect('/' . $url);
                } else {
                    Envelopes_Model_Messages::add('Wrong password', 'error');
                }
            } else {
                Envelopes_Model_Messages::add('User does not exist', 'error');
            }
        } else {
            Envelopes_Model_Messages::add('Fill the form', 'error');
        }
    }

    function configAction()
    {
        $this->view->params = null;
    }
    
    function logOutAction()
    {
        $session = new Zend_Session_Namespace('Envelopes');
        unset($session->user);
        Envelopes_Model_Messages::add('Logged out','success');
        $this->_redirect($this->view->baseUrl().'/envelopes');
    }
}