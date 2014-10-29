<?php 
class Envelopes_Model_Form_Config{
    
    protected $_form;
    
    function __construct() {
        $this->_form = new \Pform\Form('config','Config');
        $this->_form->setAction(Zend_Layout::getMvcInstance()->getView()->baseUrl().'/envelopes/index/config');
        $button = new \Pform\Button('save', 'Save', 'save');
        $checkbox = new Pform\Input_Checkbox('has_envelope', '0',"I don't want any envelope");
        $checkbox->setIcon('envelope-o');
        $this->_form->addElement($checkbox);
        $checkbox2 = new Pform\Input_Checkbox('wants_mail','0',"I don't want to get any email");
        $checkbox2->setIcon('paper-plane-o');
        $this->_form->addElement($checkbox2);
        $this->_form->addElement($button);
    }
    
    /**
     * 
     * @return \Pform\Form
     */
    function getForm()
    {
        return $this->_form;
    }
    
    function render()
    {
        return $this->_form->render();
    }
}