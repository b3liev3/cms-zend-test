<?php
class Envelopes_View_Helper_Login extends Zend_View_Helper_Abstract{
    
    function login()
    {
        $html = array();
        $html[] = "<form method='post' class='uk-form uk-form-stacked'>";
        $html[] = "<legend>Login</legend>";
        $html[] = "<fieldset>";
        $html[] = $this->view->element('User','user',"<input name='user' type='text' />");
        $html[] = $this->view->element('Password','password',"<input name='password' type='password' />");
        $html[] = $this->view->button('Login','login');
        $html[] = "</fieldset>";
        $html[] = "</form>";
        return implode('',$html);
    }
}