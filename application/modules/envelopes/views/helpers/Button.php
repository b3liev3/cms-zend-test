<?php
class Envelopes_View_Helper_Button extends Zend_View_Helper_Abstract{
    
    function button($label,$name,$value = null)
    {
        if($value == null){
            $value = $name;
        }
        $html = array();
        $html[] = '<div class="uk-form-row">';
        $html[] = '<button name="'.$name.'" value="'.$value.'" class="uk-button">'.$label.'</button>';
        $html[] = '</div>';
        return implode('',$html);
    }
}