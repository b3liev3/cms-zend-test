<?php
class Envelopes_View_Helper_Button extends Zend_View_Helper_Abstract{
    
    function button($name)
    {
        $html = array();
        $html[] = '<div class="uk-form-row">';
        $html[] = '<button class="uk-button">'.$name.'</button>';
        $html[] = '</div>';
        return implode('',$html);
    }
}