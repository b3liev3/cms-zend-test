<?php
class BugController extends Zend_Controller_Action
{
    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }
    
    public function submitAction()
    {
        $form = new Form_BugReportForm();
        
        if($this->_request->isPost()){
            if($form->isValid($this->_request->getParams())){
                //save values
                $bugModel = new Model_Bug();
                $result = $bugModel->crateBug(
                        $form->getValue('author'),
                        $form->getValue('email'),
                        $form->getValue('date'),
                        $form->getValue('url'),
                        $form->getValue('description'),
                        $form->getValue('priority'),
                        $form->getValue('status'));
                
                if($result){
                    $this->_forward('confirm');
                }
            }
        }
        
        $this->view->form = $form;
    }
    
    public function confirmAction()
    {
        
    }
    
    public function listAction()
    {
        $sort = null;
        $filter = null;
        $form = new Form_BugReportListToolsForm();
        
        if($this->_request->isPost()){
            if($form->isValid($this->_request->getParams())){
                $sort = $form->getValue('sort');
                if($sort == '0'){
                    $sort = null;
                }
                $filter = $form->getValue('filter');
                if($filter == '0'){
                    $filter = null;
                }else{
                    $filter = array("{$form->getValue('field')}" => $filter);
                }
            }
        }
        $bugModel = new Model_Bug();
        $this->view->bugs = $bugModel->fetchBugs($filter,$sort);
        
        
        $this->view->form = $form;
    }
}