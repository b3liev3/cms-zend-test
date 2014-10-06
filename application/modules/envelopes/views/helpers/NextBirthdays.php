<?php 
class Envelopes_View_Helper_NextBirthdays extends Zend_View_Helper_Abstract{
    
    function nextBirthdays()
    {
        $html = array();
        $html[] = "<ul id='next-birthdays-list' class='uk-list uk-list-line'>";
        $html[] = "<li class='past'><span class='date'>September-01</span> Name Lastname Lastname2</li>";
        $html[] = "<li class='past'><span class='date'>September-24</span> Name Lastname Lastname2</li>";
        $html[] = "<li class='past'><span class='date'>September-30</span> Name Lastname Lastname2</li>";
        $html[] = "<li class='separator'><span class='date'>Today</span> </li>";
        $html[] = "<li><span class='date'>October-14</span> Name Lastname Lastname2</li>";
        $html[] = "<li><span class='date'>October-15</span> Name Lastname Lastname2</li>";
        $html[] = "<li><span class='date'>October-20</span> Name Lastname Lastname2</li>";
        $html[] = "<li><span class='date'>October-21</span> Name Lastname Lastname2</li>";
        $html[] = "<li><span class='date'>October-22</span> Name Lastname Lastname2</li>";
        $html[] = "<li><span class='date'>October-25</span> Name Lastname Lastname2</li>";
        $html[] = "<li><span class='date'>October-30</span> Name Lastname Lastname2</li>";
        $html[] = "<li><span class='date'>Nomvember-05</span> Name Lastname Lastname2</li>";
        $html[] = "</ul>";
        
        return implode('',$html);
    }
}
