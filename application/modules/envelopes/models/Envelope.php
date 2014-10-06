<?php
class Envelopes_Model_Envelope{
    
   protected $_id = -1;
   
   protected $_inCharge;
   
   protected $_forWhom;
   
   protected $_closeDate;
   
   protected $_comments;
    
   function __construct($inCharge,$forWhom,$closeDate,$comments)
   {
       $this->_inCharge = $inCharge;
       $this->_forWhom = $forWhom;
       $this->_closeDate = $closeDate;
       $this->_comments = $comments;
   }
   
   function getInCharge()
   {
       return $this->_inCharge;
   }
   
   function getForWhom()
   {
       return $this->_forWhom;
   }
   
   function getCloseDate()
   {
       return $this->_closeDate;
   }
   
   function getComments()
   {
       return $this->_comments;
   }
   
   function hasBeenSaved()
   {
       if($this->_id == -1){
           return false;
       }
       return true;
   }
   
   function getId()
   {
       return $this->_id;
   }
   
   function setId($value)
   {
       $this->_id = $value;
       return $this;
   }
   
   function setInCharge($value)
   {
       $this->_inCharge = $value;
       return $this;
   }
   
   function setForWhom($value)
   {
       $this->_forWhom = $value;
       return $this;
   }
   
   function setCloseDate($value)
   {
       $this->_closeDate = $value;
       return $this;
   }
   
   function setComments($value)
   {
       $this->_comments = $value;
       return $this;
   }
   
}