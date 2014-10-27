<?php
class Envelopes_View_Helper_Config extends Zend_View_Helper_Abstract{
    
    function config($values = null)
    {
        $form = new Envelopes_Model_Form_Config();
        if($values){
            $form->setValues($values);
        }
        return $form->render();
    }
}