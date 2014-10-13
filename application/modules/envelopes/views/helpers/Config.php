<?php
class Envelopes_View_Helper_Config extends Zend_View_Helper_Abstract{
    
    function config()
    {
        $html = array();
        $html[] = "<form method='post' action='/envelopes/index/config'>";
        $html[] = $this->view->element("I don't want any envelope",'has_envelope',"<input type='checkbox' name='has_envelope' />");
        $html[] = $this->view->button('Save','save','envelopes-index');
        $html[] = "</form>";
        return implode('',$html);
    }
}