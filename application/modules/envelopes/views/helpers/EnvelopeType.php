<?php
class Envelopes_View_Helper_EnvelopeType extends Envelopes_View_Helper_Select{
    
    protected $_options = array(
        'BIRTHDAY' => 'Birthday',
        'BABY' => 'Baby',
        'WEDDING' => 'Wedding',
        'OTHER' => 'Other'
    );
    
    function envelopeType()
    {
        return $this;
    }
    
}