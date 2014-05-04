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
    
    public function editAction()
    {
        $bugModel = new Model_Bug();
        
        $form = new Form_BugReportForm();
        
        $params = $this->_request->getParams();
        if(isset($params['id'])){
            $id = $this->_request->getParam('id');
            $bug = $bugModel->find($id)->current();
            if($bug){
                $form->populate($bug->toArray());
                $date = $form->getElement('date')->setValue(date('m-d-Y',$bug->date));
                $this->view->bug = $bug;
            }
            
        }
        
        
        $this->view->form = $form;
    }
    
    public function listAction()
    {
        $sort = $this->_request->getParam('sort',null);
        $filter = $this->_request->getParam('filter',null);
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
        $bugModels = new Model_Bug();
        $adapter = $bugModels->fetchPaginatorAdapter($filter,$sort);
        
        $paginator = new Zend_Paginator($adapter);
        //show 10 bugs per page
        $paginator->setItemCountPerPage(10);
        //get the page number that is passed in the request
        //if none is set then default page to 1
        $page = $this->_request->getParam('page',1);
        $paginator->setCurrentPageNumber($page);        
        //pass the paginator to the view to render
        $this->view->paginator = $paginator;
        
        $this->view->form = $form;
    }
}