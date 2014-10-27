<?php 
class Envelopes_Model_Form_Config{
    
    protected $_form;
    
    function __construct() {
        $this->_form = new \Pform\Form('config','Config');
        $this->_form->setAction(Zend_Layout::getMvcInstance()->getView()->baseUrl().'/envelopes/index/config');
        $button = new \Pform\Button('save', 'Save', 'envelopes-index');
        $checkbox = new Pform\Input_Checkbox('has_envelope', "I don't want any envelope");
        $this->_form->addElement($checkbox);
        $this->_form->addElement($button);
    }
    
    function render()
    {
        return $this->_form->render();
    }
}