<?php
class CardTest extends PHPUnit_Framework_TestCase{
    
    function testGetNumber(){
        $card = new Card('4','spades');
        $actualNumber = $card->getNumber();
        $this->assertEquals(4,$actualNumber, 'Number should be <4>');
    }
    
    function testGetSuit(){
        $card = new Card('4','spades');
        $actualSuit = $card->getSuit();
        $this->assertEquals('spades', $actualSuit, 'Suit should be <spades>');
    }
    
    function testIsInMatchingSet(){
        $card = new Card('4','spades');
        $matchingCard = new Card('4','hearts');
        $this->assertTrue($card->isInMatchingSet($matchingCard),'<4 of Spades> should match <4 of Hearts>');
    }
    
    function testIsNotInMatchingSet(){
        $card = new Card('4','spades');
        $matchingCard = new Card('5','hearts');
        $this->assertFalse($card->isInMatchingSet($matchingCard),'<4 of Spades> should not match <5 of Hearts>');
    }
}