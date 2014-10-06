<?php
class Envelopes_Model_MessageFactory{
    
    private function __construct()
    {
        
    }
    
    static function make($text,$type)
    {
        $message = new Envelopes_Model_Message($text);
        switch($type)
        {
            case 'info':
                $message->setInfo();
                break;
            case 'error':
                $message->setError();
                break;
            case 'warning':
                $message->setWarning();
                break;
            case 'success':
                $message->setSuccess();
                break;
            default:
                throw new Exception("Wrong type.");
                break;
        }
        return $message;
    }
}