<?php
/**
 * I need to use session
 */
class Envelopes_Model_Messages {

    private function __construct() {
        
    }

    static function add($text,$type = 'info') {
        
        $message = Envelopes_Model_MessageFactory::make($text,$type);
        
        if (Zend_Registry::isRegistered('messages')) {
            $messages = Zend_Registry::get('messages');
            $messages[] = $message;
        } else {
            $messages = array($message);
        }
        Zend_Registry::set('messages', $messages);
    }

    static function render() {
        if (Zend_Registry::isRegistered('messages')) {
            $messages = Zend_Registry::get('messages');
            if ($messages) {
                $html = array();
                foreach ($messages as $message) {
                   $html[] = $message->render();
                }
            }
            Zend_Registry::set('messages', array());
            return implode('',$html);
        }
        return '';
    }

}