<?php

namespace Dummy {

    class Card {

        private $_number;
        private $_suit;

        function __construct($number, $suit) {
            $this->_number = $number;
            $this->_suit = $suit;
        }

        function getNumber() {
            return $this->_number;
        }

        function getSuit() {
            return $this->_suit;
        }
        
        function isInMatchingSet(Card $card){
            return ($this->getNumber() == $card->getNumber());
        }

    }

}