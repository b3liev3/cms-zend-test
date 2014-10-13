<?php

/**
 * I need to use session
 */
class Envelopes_Model_Messages {

    private function __construct() {
        
    }

    static function add($text, $type = 'info') {

        $message = Envelopes_Model_MessageFactory::make($text, $type);

        $session = new Zend_Session_Namespace('Envelopes');
        if ($session->messages) {
            $session->messages[] = $message;
        } else {
            $session->messages = array($message);
        }
    }

    static function render() {
        $session = new Zend_Session_Namespace('Envelopes');
        if ($session->messages) {
            $html = array();
            foreach ($session->messages as $message) {
                $html[] = $message->render();
            }

            $session->messages = array();
            return implode('', $html);
        }
        return '';
    }

}