<?php
class Envelopes_View_Helper_EnvelopeType extends Envelopes_View_Helper_Select{
    
    protected $_options = array(
        Envelopes_Model_EnvelopeMapper::CONST_TYPE_BIRTHDAY => 'Birthday',
        Envelopes_Model_EnvelopeMapper::CONST_TYPE_BABY => 'Baby',
        Envelopes_Model_EnvelopeMapper::CONST_TYPE_WEDDING => 'Wedding',
        Envelopes_model_envelopeMapper::CONST_TYPE_OTHER => 'Other'
    );
    
    function envelopeType()
    {
        return $this;
    }
    
}