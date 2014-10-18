<?php
class Envelopes_View_Helper_Form extends Zend_View_Helper_Abstract{
    
    /**
     *
     * @var \Pform\Form
     */
    protected $_form;
    
    function form($htmlId)
    {
        $this->_form = new \Pform\Form($htmlId);
        return $this;
    }
    
    function render()
    {
        $this->_form->render();
    }
}