<?php
class Envelopes_View_Helper_Element extends Zend_View_Helper_Abstract{
    
    function element($label,$name,$input)
    {
        $html = array();
        $html[] = '<div class="uk-form-row">';
        $html[] = '<label class="uk-form-label" for="'.$name.'">'.$label.'</label>';
        $html[] = $input;
        $html[] = '</div>';
        return implode('',$html);
    }
}