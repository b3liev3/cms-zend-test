<?php
class MyLibrary_Controller_Action extends Zend_Controller_Action
{
    function init() {
        parent::init();

        $this->_helper->layout->setLayout('envelopes');
        $this->view->headScript()->appendFile($this->view->baseUrl().'/js/jQuery/jquery-2.1.1.min.js');
        $this->view->headScript()->appendFile($this->view->baseUrl().'/js/uikit/uikit.js');
        $this->view->headLink()->appendStylesheet($this->view->baseUrl().'/css/uikit/uikit.gradient.css');
        $this->view->headLink()->appendStylesheet($this->view->baseUrl().'/css/uikit/addons/uikit.gradient.addons.min.css');
    }
    
    protected function _addJs($fullPathFromPublic)
    {
        $this->view->headScript()->appendFile($fullPathFromPublic);
        return $this;
    }
    
    protected function _addUikitComponent($name)
    {
        $this->view->headScript()->appendFile($this->view->baseUrl().'/js/uikit/addons/'.$name.'.min.js');
        return $this;
    }
    
}