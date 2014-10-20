<?php
namespace Pform{
class Input_Text extends Input
{   

    
    protected $_type = 'text';
    

    
 
  
    function isValid($value) {
        return true;
    }
    
}
}