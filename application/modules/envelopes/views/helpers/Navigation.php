<?php
class Envelopes_View_Helper_Navigation extends Zend_View_Helper_Abstract{
    
    function navigation($pageid)
    {
        $html = array();
        $html[] = "<nav class='uk-navbar uk-navbar-attached'>";
        $html[] = "<a href='{$this->view->baseUrl()}/envelopes' class='uk-navbar-brand'>Envelopes</a>";
        $html[] = "<ul class='uk-navbar-nav'>";
        $html[] = "<li><a href='{$this->view->baseUrl()}/envelopes/envelope'><i class='uk-icon-envelope-o'></i> New Envelope</a></li>";
        $html[] = "<li class='uk-parent' data-uk-dropdown>";
            $html[] = "<a href='{$this->view->baseUrl()}/envelopes/birthdays'><i class='uk-icon-birthday-cake'></i> Birthdays</a>";
            
            $html[] = "<div class='uk-dropdown uk-dropdown-navbar'>";
                $html[] = "<ul class='uk-nav uk-nav-navbar'>";
                    $html[] = "<li><a href='{$this->view->baseUrl()}/envelopes/birthdays/birthday'>New birthday</a></li>";
                $html[] = "</ul>";
            $html[] = "</div>";

            
        $html[] = "</li>";
        $html[] = "<li><a href=''>option3</a></li>";
        $html[] = "</ul>";
        
        
        //user
        $name = '';
        if(Zend_Registry::isRegistered('user')){
            $user = Zend_Registry::get('user');
            $name = $user->getId();
        }
        
        $html[] = '<div class="uk-navbar-flip">';
        $html[] = '<ul class="uk-navbar-nav">';
        if($name != ''){
            $html[] = '<li class="uk-parent" data-uk-dropdown><a href=""><i class="uk-icon-cog"></i> '.$name.'</a>';
            
            $html[] = "<div class='uk-dropdown uk-dropdown-navbar'>";
                $html[] = "<ul class='uk-nav uk-nav-navbar'>";
                    $html[] = "<li><a href='{$this->view->baseUrl()}/envelopes/index/log-out'>Log out</a></li>";
                $html[] = "</ul>";
            $html[] = "</div>";
            
            $html[] = '</li>';
        }
        $html[] = '</ul>';
        $html[] = '</div>';

        $html[] = "</nav>";
        return implode('',$html);
    }
}


   
    

