<?php
class MobileController extends Zend_Controller_Action
{
    public function indexAction()
    {
        $this->view->form = new Form_User();
    }
}