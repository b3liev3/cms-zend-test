<?php
class Envelopes_Model_Envelope{
    
   protected $_id = -1;
   
   protected $_inCharge;
   
   protected $_forWhom;
   
   protected $_closeDate;
   
   protected $_comments;
   
   protected $_type;
   
   protected $_year;
    
   function __construct($inCharge,$forWhom,$type,$closeDate,$comments,$year,$type)
   {
       $this->_inCharge = $inCharge;
       $this->_forWhom = $forWhom;
       $this->_closeDate = $closeDate;
       $this->_comments = $comments;
       $this->_type = $type;
       $this->_year = $year;
   }
   
   function setType($value)
   {
       $this->_type = $value;
   }
   
   function setYear($value)
   {
       $this->_year = $value;
       return $this;
   }
   
   function getYear()
   {
       return $this->_year;
   }
   
   function getType()
   {
       return $this->_type;
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