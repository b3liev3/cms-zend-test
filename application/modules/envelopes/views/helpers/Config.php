<?php
class Envelopes_View_Helper_Config extends Zend_View_Helper_Abstract{
    
    /**
     * 
     * @return \PForm\Form
     */
    function config()
    {
        $user = Zend_Registry::get('user');
        $userMapper = new Envelopes_Model_UserMapper();
        $row = $userMapper->findRow($user->getId());
        $form = new Envelopes_Model_Form_Config();
        return $form->getForm()->setValues($row);
    }
}